<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

use App\Employee;
use App\User;
use App\Measure_lists;
use App\Measure;
use Response;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;

class EmployeeController extends Controller
{
    //

    public function index()
    {
	 
    }
	
	public function dashboard_employee(){
		$id = Auth::user()->id;
		$comp_id = Auth::user()->user_id;
		
		$employee_username = DB::table('Employees')
			->where('employee_id','=',Auth::user()->emp_detail)
			->get();
		
		
		$measure_lists = DB::table('measure_lists')
			
			->leftJoin('measure','measure.id','=','measure_lists.measure_id')
			->leftJoin('users','users.id','=','measure_lists.employee_id')
			->where('users.id','=',$id)
			->where('users.user_id','=',$comp_id)
			->get();
		
		$measure_graph = DB::table('measure_lists')
			->select(DB::raw("sum(measure_lists.value_a)as value_a ,sum(measure_lists.value_b)as value_b,sum(measure_lists.value_c) as value_c,measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))
			->leftJoin('measure','measure.id','=','measure_lists.measure_id')
			->leftJoin('users','users.id','=','measure_lists.employee_id')
			->where('users.id','=',$id)
			->where('users.user_id','=',$comp_id)
			->get();
		
		$check_measure = $measure_lists->count();
		$check_graph = $measure_graph->count();
		
		if($check_measure < 4 || $check_graph < 4) {
			return view('dashboard-employee-empty',['info'=>$employee_username]);
		}else {
		//	print_r($check_measure);
		//	print_r($check_graph);
			
			
		return view('dashboard-employee', ['measure_lists'=> $measure_lists,'info'=>$employee_username,'emp_graph'=> $measure_graph,'emp_graph_b'=> $measure_graph,'emp_graph_c'=> $measure_graph]);	
		
		}
	}
	

    public function create(Request $request)
    	{
	
	 $email_add = $request->input('employee_email');
		
	$check = DB::table('users')
		->where('username','=',$email_add)
		->get();
	
	if(count($check) == 0) {		
   	
    $employee = new Employee;
	
    $employee->employee_name = $request->input('employee_name');
    $employee->employee_email = $request->input('employee_email');
    $employee->company_id = Auth::user()->user_id;	
		
    $employee->save();

	$e_account = new User;
	
	$e_account->username = $request->input('employee_email');
	$e_account->password = Hash::make($request->input('password'));
	$e_account->level = 'employee';	
	$e_account->user_id = Auth::user()->user_id;
	$e_account->emp_detail = $employee->id;
	$e_account->status = '1';	
	$e_account->save();	
	
	//	$red = '/account/activate/?email='.$request->input('employee_email');	
    // return  redirect();
	
		return view('form.employee_regsuccessful');
    
	 }else {
	 	return view('form.regfailed');
	 }
				
		}
	
	
	
	public function disp_measure(){
	
		$company_id = Auth::user()->user_id;

		$emp_measure = db::table('measure')
			->select(DB::raw("measure.id as mid,measure.target_a, measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c"))
			->leftJoin('users','users.user_id','=','measure.company_id')
			->where('measure.company_id','=',$company_id)
			->where('users.level','=','company')
			->get();
		
		
		
		
			
		return view('employee.measure', ['emp_measure' => $emp_measure]);	
	}
	

	
	public function create_measure(Request $request){
		
	$mlists = new Measure_lists;
	
	$ldate = date('Y-m-d');
		
	$chk_date = db::table('measure_lists')
		->where('date_posted',$ldate )
		->where('employee_id',Auth::user()->id)
		->first();
		
	if((count($chk_date) ) > 0)
		{
		
		//echo "There is data";

			DB::table('measure_lists')
					->where('id',$chk_date->id)
					->update(['value_a' => $request->input('value_a'),'value_b' => $request->input('value_b'),'value_c' => $request->input('value_c')]);
					
				

		 //	echo 'update';
		return redirect('/login');
		}
		else {	
		//	echo "No data";
		
	
	$mlists->employee_id = 	Auth::user()->id;
	$mlists->measure_id = 	$request->input('measure_id');
   	$mlists->value_a = 		$request->input('value_a');
  	$mlists->value_b = 		$request->input('value_b');
 	$mlists->value_c = 		$request->input('value_c');	
	$mlists->date_posted = 	$ldate;
		
	$mlists->save();
	return redirect('/measure/emp_history');
		}
		
	
	
	}

	
	
	
	
	
	
	function isWeekend($date) 
	{
		$weekDay = date('w', strtotime($date));
		return ($weekDay == 0 || $weekDay == 6);
	}
	
	public function disp_employee_measure()
	{
		$ldate = date('Y-m-d');
		echo 'Weekend:'.isWeekend($ldate);
		
	}

	
	
	public function disp_emp_measure(){
	
		$id = Auth::user()->id;
		$comp_id = Auth::user()->user_id;
		
		$measure_lists = DB::table('measure_lists')
			
			->leftJoin('measure','measure.id','=','measure_lists.measure_id')
			->leftJoin('users','users.id','=','measure_lists.employee_id')
			->where('users.id','=',$id)
			->where('users.user_id','=',$comp_id)
			->get();
		
		$check_measure_lists = $measure_lists->count();
		
		if($check_measure_lists >= 3){
		return view('employee.measure_history',['measure_lists'=> $measure_lists]);
	
		}else {
			return redirect('/dashboard-employee/');
	
		}
		
		
	}
  


  


    public function edit_employees ($id)
	{

		$employees = DB::table('users')
					->leftJoin('Employees', 'Employees.employee_id', '=', 'users.emp_detail')
					->where('users.id','=',$id)
					->where('users.level','=','employee')
					->get();
		
		
	//	print_r($employees);	
		return view('form.edit-employee',['employees'=>$employees,'eid'=>$id]);
	//	return view('form.blank',['employee'=> $employees]);
	
	}
    
	public function update_employees (Request $request)
	{
		$employee_id = $request->input('eid');
		$emp_id = $request->input('emp_id');
		
		$employee_name = $request->input('employee_name');
    	$employee_email = $request->input('employee_email');
    
		$password = Hash::make($request->input('password'));
		
			DB::table('Employees')
					->where('employee_id',$emp_id)
					->update(['employee_name' => $employee_name,'employee_email' => $employee_email]);

		 
		
			DB::table('users')
				->where('emp_detail', $employee_id)
				->update(['password' => $password ]);
	
			echo 'update';
			
			return redirect('/employee/lists');
	}


	public function delete_employees(Request $request){
	
		$emp_detail = $request->input('eid');
		$user_id = $request->input('id'); 
		
		DB::table('users')->where('id', '=', $user_id)->delete();
		DB::table('Employees')->where('employee_id', '=', $emp_detail)->delete();
		DB::table('measure_lists')->where('employee_id', '=', $user_id)->delete();
		
	//	echo 'deleted';
		
		return redirect('/employee/lists');
	}
	
	
	public function disp_graph(){
	
		
		$emp_id = Auth::user()->id;
	
		
			$emp_graph = DB::table('measure_lists')
				->leftJoin('measure','measure.id','=','measure_lists.measure_id')
				->where('measure_lists.employee_id','=',$emp_id)
				->whereRaw('measure_lists.date_posted = DATE(NOW())')
				
				->get();
			
			$emp_graph_measure_b = DB::table('measure_lists')
				->leftJoin('measure','measure.id','=','measure_lists.measure_id')
				->where('measure_lists.employee_id','=',$emp_id)
				->whereRaw('measure_lists.date_posted = DATE(NOW())')
				
				->get();
		
			$emp_graph_measure_c = DB::table('measure_lists')
				->leftJoin('measure','measure.id','=','measure_lists.measure_id')
				->where('measure_lists.employee_id','=',$emp_id)
				->whereRaw('measure_lists.date_posted = DATE(NOW())')
				->get();
	//	print_r($emp_graph);
		
			/*	
			 ->select(DB::raw("measure.target_a,measure.target_b,measure.target_c, SUM(measure_lists.value_a)as value_a, SUM(measure_lists.value_b)as value_b, SUM(measure_lists.value_c)as value_c, measure.company_id"))
			->join("measure_lists","measure_lists.measure_id","=","measure.id")			
			->get();
			*/
	
		return view('graph.employee',['emp_graph'=> $emp_graph,'emp_graph_measure_b' =>$emp_graph_measure_b,'emp_graph_measure_c' =>$emp_graph_measure_c]);
	}
   
	
	


}   
