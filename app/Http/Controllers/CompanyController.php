<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Company;
use App\User;
use App\Measure;
use App\Measure_list;
use Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;


class CompanyController extends Controller
{
    //

    public function index()
    {
	 
   
    }

	
	public function dashboard_company(){
		$edate = date("Y-m-d");
		$ndate = strtotime('-4 week',strtotime($edate));
		$sdate = date("Y-m-d",$ndate);
		
		$id = Auth::user()->id;
		$company_id = Auth::user()->user_id;
		
		$info = DB::table('company')
			->where('company_id','=',$company_id)
			->get();
		
		
		$employees = DB::table('users')
					->leftJoin('Employees', 'Employees.employee_id', '=', 'users.emp_detail')
					->where('users.user_id','=',$company_id)
					->where('users.level','=','employee')
					->get();
		
		
		$measure_lists = DB::table('measure')
				->where('company_id','=',Auth::user()->user_id)
				->get();
		
		
		
		$company_id = Auth::user()->user_id;
		
		$check_emp = $employees->count();
		$check_measure = $measure_lists->count();
		
		if($check_emp == 0 || $check_measure == 0) {
		  return view('dashboard-company-empty',['info'=>$info]);
		}else {
		
		$gen_graph = DB::table('measure_lists')
				->select(DB::raw("Employees.employee_name,sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c,measure_lists.employee_id, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))
				->LeftJoin('users','users.id','=','measure_lists.employee_id')
				->LeftJoin('Employees','Employees.employee_id','=','measure_lists.employee_id')
				->LeftJoin('measure','measure.company_id','=','users.user_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and users.user_id = '".$company_id ."'")
				->groupBy('measure_lists.employee_id')
				->get();
		
				$gen_donut_graph = DB::table('measure_lists')
				->select(DB::raw("sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))	
				->LeftJoin('measure','measure.id','=','measure_lists.measure_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and measure.company_id = '".$company_id ."'")
				->get();
			
		
		return view('dashboard-company',['info'=>$info,'employees'=>$employees,'measure'=>$measure_lists,'gen_graph_a'=>$gen_graph,'gen_graph_b'=>$gen_graph,'gen_graph_c'=>$gen_graph,'donut_graph_a'=>$gen_donut_graph,'donut_graph_b'=>$gen_donut_graph,'donut_graph_c'=>$gen_donut_graph]);
		
		}
		
	}

    public function create(Request $request)
    {
	$email_address = $request->input('email');
		
	$check = DB::table('users')
		->where('username','=',$email_address)
		->get();
				
	if(count($check) == 0){
    	
    $company = new Company;
	
    $company->company_name = $request->input('company_name');
    $company->company_email = $request->input('email');
    $company->company_status = '1';		
    $company->save();

	$e_account = new User;
	
	$e_account->username = $request->input('email');
	$e_account->password = Hash::make($request->input('password'));
		
	$e_account->level = 'company';	
	$e_account->status = '1';
	$e_account->user_id = $company->id;
	$e_account->save();	
		
	$measure = new Measure;
	$measure->company_id = $company->id;
	$measure->measure_a = 'measure';
	$measure->measure_b = 'measure';
	$measure->measure_c = 'measure';
	$measure->target_a = 0;
	$measure->target_b = 0;
	$measure->target_c = 0;
	$measure->save();

   	 return view('form.company_regsuccessfully');

	} else {
		 return view('form.regfailed');
	}
	
    }
	
	public function create_test(Request $request)
    {
    	
    $employee = new Company;
	
    $employee->company_name = 'Joemar';
    $employee->company_email = 'joemar.t.lamata@gmail.com';
    $employee->company_status = '1';		
    $employee->save();

	$e_account = new User;
	
	$e_account->username = 'joemar.t.lamata@gmail.com';
	$e_account->password = 'password';
	$e_account->level = "company";	
	$e_account->status = '1';	
	$e_account->save();		
//	$red = '/account/activate/?email='.$request->input('employee_email');	
    return view('form.company_regsuccessfully');
//	echo 'save';
    }


	public function lists_employees()
	{
	
		$company_id= Auth::user()->user_id;
		
		$employees = db::statement("select users.username, users.id, users.emp_detail from users LEFT JOIN Employees on Employees.employee_id = users.user_id where users.user_id = '1' and users.level = 'employee'
");	 
		
		$employees = DB::table('users')
					->leftJoin('Employees', 'Employees.employee_id', '=', 'users.emp_detail')
					->where('users.user_id','=',$company_id)
					->where('users.level','=','employee')
					->get();
		
		return view('employee.listing',['employees' => $employees]);
					
	}


	public function disp_graph(){
		/*
		$sdate = date('Y-m-j');
		$newdate = strtotime ( '-7 day' , strtotime ( $sdate ) ) ;
		$edate = date ( 'Y-m-j' , $newdate );
		*/
		$sdate = '2018-04-22';
		$edate = '2018-04-29';
		
		
		$company_id = Auth::user()->user_id;
		
				$gen_graph = DB::table('measure_lists')
				->select(DB::raw("Employees.employee_name,sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c,measure_lists.employee_id, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))
				->LeftJoin('users','users.users_id','=','measure.company_id')
				->LeftJoin('Employees','Employees.employee_id','=','measure_lists.employee_id')
				->LeftJoin('measure','measure.company_id','=','users.user_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and users.user_id = '".$company_id ."'")
				->groupBy('measure_lists.employee_id')
				->get();
		
				$gen_donut_graph = DB::table('measure_lists')
				->select(DB::raw("sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))	
				->LeftJoin('measure','measure.id','=','measure_lists.measure_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and users.user_id = '".$company_id ."'")
				->get();
			
		return view('graph.company',['gen_graph_a'=>$gen_graph,'gen_graph_b'=>$gen_graph,'gen_graph_c'=>$gen_graph,'donut_graph_a'=>$gen_donut_graph,'donut_graph_b'=>$gen_donut_graph,'donut_graph_c'=>$gen_donut_graph,]);
		
		
	}
   
	
	public function view_measure(){
	
		$measure_lists = DB::table('measure')
				->where('company_id','=',Auth::user()->user_id)
				->get();
		
		return view('measure_list',['measure_lists'=> $measure_lists]);
		
	}
	
	
	public function gen_employee_graph(){
		if(!\Auth::check() || (Auth::user()->level) != 'company'){
				Auth::logout();
			}
		else {
		return view('form.gen-emp-graph');
		}
	}
	
	public function gen_company_graph(){
		if(!\Auth::check() || (Auth::user()->level) != 'company'){
				Auth::logout();
			}
		else {
		return view('form.gen-company-graph');
		}
	}
	
	public function disp_employee_graph(Request $request){
		
		$sdate = $request->input('sdate');
		$edate = $request->input('edate');
		$company_id = Auth::user()->user_id;
		
		$gen_graph = DB::table('measure_lists')
				->select(DB::raw("Employees.employee_name,sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c,measure_lists.employee_id, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))
				->LeftJoin('users','users.id','=','measure_lists.employee_id')
				->LeftJoin('Employees','Employees.employee_id','=','measure_lists.employee_id')
				->LeftJoin('measure','measure.company_id','=','users.user_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and users.user_id = '".$company_id ."'")
				->groupBy('measure_lists.employee_id')
				->get();
		
				$gen_donut_graph = DB::table('measure_lists')
				->select(DB::raw("sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))	
				->LeftJoin('measure','measure.id','=','measure_lists.measure_id')
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."' and measure.company_id = '".$company_id ."'")
				->get();
			
		
		return view('graph.gen-graph',['gen_graph_a'=>$gen_graph,'gen_graph_b'=>$gen_graph,'gen_graph_c'=>$gen_graph,'donut_graph_a'=>$gen_donut_graph,'donut_graph_b'=>$gen_donut_graph,'donut_graph_c'=>$gen_donut_graph,]);
	}
	
	
	
	
	public function disp_company_graph(Request $request){
	//	return view('form.gen-company-graph');
	}
	
	
	
	/* graph company
	
	select * from measure_lists as mm LEFT JOIN users as u on u.users_id = measure_lists.employee_id left join Employees as e on e.employee_id = mm.employee_id left join measure as m on m.company_id = u.user_id GROUP by mm.employee_id;
	
	
	
	SELECT * FROM measure_lists as m left JOIN users as u on u.id = m.employee_id LEFT JOIN measure as v on 
v.company_id = u.user_id

where m.date_posted BETWEEN '2018-04-01' AND '2018-04-13' and u.user_id = '1';

		

	*/
    


	public function company_disp_emp_measure(Request $request){
	
		$id = $request->input('id');
		$comp_id = Auth::user()->user_id;
		
		$measure_lists = DB::table('measure_lists')
			
			->leftJoin('measure','measure.id','=','measure_lists.measure_id')
			->leftJoin('users','users.id','=','measure_lists.employee_id')
			->where('users.id','=',$id)
			->where('users.user_id','=',$comp_id)
			->get();
		
		return view('employee.measure_history',['measure_lists'=> $measure_lists]);
		
		/*
		SELECT  u.id, u.user_id, e.measure_a, e.measure_b, e.measure_c, m.measure_id, m.value_a, m.value_b, m.value_c, m.employee_id, m.measure_id, m.date_posted  FROM measure_lists as m LEFT JOIN measure as e on e.id = m.measure_id left join users as u on u.id = m.employee_id where u.user_id = '1' and u.id = '17' ORDER by date_posted asc;
		*/
		
		
	}
  
	
	
	
   
	
	


}   
