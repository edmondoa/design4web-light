<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Company;
use App\User;
use Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;


class AdminController extends Controller
{
    //

    public function index()
    {
	 
   
    }

	
	public function dashboard_admin()
	{
		$new_date = date("Y-m-d");
		$ndate = strtotime('-4 week',strtotime($new_date));
		$nndate = date("Y-m-d",$ndate);
		
		$companies = DB::table('company')
				->get();
		$measure = DB::table('measure')
				->get();
		
		
		$sdate = $nndate;
		$edate = $new_date;
		
		$check_companies = $companies->count();
		$check_measure = $measure->count();
		
		if($check_companies == 0 || $check_measure == 0){
		//	return view('dashboard-admin-empty');
			return redirect('/company/create');
		}else {

				$gen_donut_graph = DB::table('measure_lists')
				->select(DB::raw("sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c, IFNULL(measure.target_a,0)as target_a,IFNULL(measure.target_b,0)as target_b,IFNULL(measure.target_c,0)as target_c,IFNULL(measure.measure_a,0)as measure_a,IFNULL(measure.measure_b,0)as measure_b,IFNULL(measure.measure_c,0)as measure_c, measure_lists.date_posted, IFNULL(measure.company_id,0)as company_id, IFNULL(company.company_name,0)as company_name"))	
				->LeftJoin('measure','measure.id','=','measure_lists.measure_id')
				->LeftJoin('company','measure.company_id','=','company.company_id')	
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."'")
				->groupBy("measure.company_id")
				->get();
		
		$l = $gen_donut_graph->count();
			if($l <=3) {
				return view('dashboard-admin-empty');
			}else {
		return view('dashboard-admin',['company'=>$companies,'donut_graph_main'=>$gen_donut_graph,'donut_graph_a'=>$gen_donut_graph,'donut_graph_b'=>$gen_donut_graph,'donut_graph_c'=>$gen_donut_graph,]);
			}	
		}
	}
	
	
	public function lists(){
	
			if(!\Auth::check() || (Auth::user()->level) != 'admin'){
				Auth::logout();
			}
		else {
				
		$company_lists = DB::table('company')
				->get();
		
		//echo print_r($company_lists);
			
		return view('admin.company',['company'=>$company_lists]);
		}
		
		}
	
	
	public function edit_company($id){
	
			if(!\Auth::check() || (Auth::user()->level) != 'admin'){
				Auth::logout();
			}
		else {
				
		$company_lists = DB::table('company')
				
				->where('company_id','=',$id)
				->get();
		
			
		return view('form.edit-company',['company'=>$company_lists]);
		
		}
		
		}
	
	
	public function update_company(Request $request){
	
			if(!\Auth::check() || (Auth::user()->level) != 'admin'){
				Auth::logout();
			}
		else {
		$company_id = $request->input('cid');			
		$company_name = $request->input('company_name');
		$company_email = $request->input('company_email');
		$company_password = $request->input('password');
			
			
		DB::table('company')
					->where('company_id',$company_id)
					->update(['company_name' => $company_name,'company_email' => $company_email]);

			
		return redirect('/dashboard');
		}

		
		
		
		}
	
	
	
	
	public function delete_company($id){
	
			if(!\Auth::check() || (Auth::user()->level) != 'admin'){
				Auth::logout();
			}
		else {
		
			$company_id = $request->input('id');
			DB::table('company')->where('company_id', '=', $company_id)->delete();	
			DB::table('users')->where('user_id', '=', $company_id)->delete();	
			DB::table('Employees')->where('company_id', '=', $company_id)->delete();	
			
		
			echo 'delete';
			
		return redirect('/dashboard');
		}
		
		}
	
	
	public function company_employees($id){
		
		$employee_lists = DB::table('Employees')
			->where('company_id','=',$id)
			->get();
		
		
		return view('admin.company-employees',['employee_lists'=>$employee_lists]);
		
	}
	
	
	public function employees_delete(Request $request){
		$emp_id = $request->input('id');
		
		DB::table('Employees')->where('employee_id', '=', $emp_id)->delete();
		DB::table('measure_lists')->where('employee_id', '=', $emp_id)->delete();
		
		return redirect('/company/lists');
	}
	
	/*
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
	
	
	
	*/
	
	
		public function disp_admin_company_graph(Request $request){
		
		$sdate = $request->input('sdate');
		$edate = $request->input('edate');
		
		
				$gen_donut_graph = DB::table('measure_lists')
				->select(DB::raw("sum(measure_lists.value_a) as value_a, sum(measure_lists.value_b) as value_b,sum(measure_lists.value_c) as value_c, measure.target_a,measure.target_b,measure.target_c,measure.measure_a,measure.measure_b,measure.measure_c, measure_lists.date_posted, measure.company_id, company.company_name"))	
				->LeftJoin('measure','measure.id','=','measure_lists.measure_id')
				->LeftJoin('company','measure.company_id','=','company.company_id')	
				->whereRaw("measure_lists.date_posted BETWEEN '".$sdate."' AND '".$edate."'")
				->groupBy("measure.company_id")
				->get();
			
		return view('graph.admin_graph',['donut_graph_main'=>$gen_donut_graph,'donut_graph_a'=>$gen_donut_graph,'donut_graph_b'=>$gen_donut_graph,'donut_graph_c'=>$gen_donut_graph]);
	}
	
	
	
   
	
	


	}   
