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


class MeasureController extends Controller
{
    //

    public function index()
    {
	 
   
    }
	
    public function view_graph(Request $request)
    {
		
			
		if((!Auth::check())|| (Auth::user()->level !='company')){
			return redirect('/login');
		}
		else {
			return view('graph');
		}
		}	


    public function create(Request $request)
    {
		$id = Auth::user()->user_id;
		$m = DB::table('measure')
			->where('company_id','=',$id)
			->get();
		
		if(count($m)> 0){
   // user found
			$data_exist = "true";
			$exist_m = DB::table('measure')
				->where('company_id','=',$id)
				->update(['measure_a'=>$request->input('m_a'),'measure_b'=>$request->input('m_b'),'measure_c'=>$request->input('m_c'),'target_a'=>$request->input('t_a'),'target_b'=>$request->input('t_b'),'target_c'=>$request->input('t_c')]);
			
	
			} else {
			$data_exist = "false";		
			$measure = new Measure;
			$measure->company_id = Auth::user()->user_id;	
			$measure->measure_a = $request->input('m_a');
			$measure->measure_b = $request->input('m_b');
			$measure->measure_c = $request->input('m_c');	
			$measure->target_a = $request->input('t_a');
			$measure->target_b = $request->input('t_b');
			$measure->target_c = $request->input('t_c');	

			$measure->save();
			
		}
    /*	
    $measure = new Measure;
	$measure->company_id = Auth::user()->user_id;	
    $measure->measure_a = $request->input('m_a');
    $measure->measure_b = $request->input('m_b');
    $measure->measure_c = $request->input('m_c');	
    $measure->target_a = $request->input('t_a');
    $measure->target_b = $request->input('t_b');
    $measure->target_c = $request->input('t_c');	
		
    $measure->save();
	
	
	*/
	return redirect('/measure/create');						   
	// echo $data_exist;
    }
	
	
	public function edit_measure(Request $request)
	{
		$id = $request->input('id');
		$measure = DB::table('measure')
				->where('id','=',$id)
				->get();
		
		return view('form.edit-measure',['measure'=>$measure]);
		
	}
	
	
	public function update_measure(Request $request)
	{
		$id = $request->input('id');
		
		DB::table('measure')
			->where('id','=',$id)
			->update(['measure_a'=>$request->input('m_a'),'measure_b'=>$request->input('m_b'),'measure_c'=>$request->input('m_c'),'target_a'=>$request->input('t_a'),'target_b'=>$request->input('t_b'),'target_c'=>$request->input('t_c')]);
		
		return redirect('/company/view-measure');
		
	}
	
	
	
	 public function create_list(Request $request)
    {
    	
    $measure = new Measure_list;
	$measure->company_id = Auth::user()->user_id;	
    $measure->measure_a = $request->input('m_a');
    $measure->measure_b = $request->input('m_b');
    $measure->measure_c = $request->input('m_c');	
    $measure->save();
	//echo 'save';
	
		 return redirect('/dashboard');
		
    }
	
	public function view_employee_measure(Request $request){
		
		$n = 0;
		$color_code = [];
			
		
		if((!Auth::check())|| (Auth::user()->level !='employee')){
			return redirect('/login');
		}
		else {
		   
		$emp_id = Auth::user()->id;
		$emp_measure = db::table('measure_lists')

				->leftJoin('measure', 'measure.id', '=', 'measure_lists.measure_id')
				->where('measure_lists.employee_id','=',$emp_id)
				->whereRaw('measure_lists.created_at BETWEEN curdate() - weekday(curdate()) AND curdate() - weekday(curdate()) + 7')
				->get();
		
		/* currect week */	
		return view('employee.lists', ['emp_measure' => $emp_measure]);	
	
		}
		
	}
	
	
	

	public function view_employee_graph($id)
	{
		$date = date('Y-m-d');
		$timestamp = strtotime($date);
		$weekday= date("l", $timestamp );
		$normalized_weekday = strtolower($weekday);
	//	echo $normalized_weekday ;
		
		if (($normalized_weekday == "saturday") || ($normalized_weekday == "sunday")) {
			echo "true";
		} else {
			echo "false";
		}
		
	}


	public function view_company_graph(Request $request)
	{
		
		$comp_id = Auth::user()->user_id;
		$user = db::table('users')
			->where('user_id','=',$comp_id)
			->where('level','=','employee')
			->count();
		
		
		//echo $user;
		/*
		SELECT a.user_id, sum(measure_lists.value_a), sum(measure_lists.value_b),sum(measure_lists.value_c), measure.target_a from users as a left join measure on measure.company_id = a.user_id LEFT join measure_lists on measure_lists.employee_id = a.id where a.level = 'employee';
		*/
		
		
			$measures = DB::table('measure')
			
			 ->select(DB::raw("measure.target_a,measure.target_b,measure.target_c, SUM(measure_lists.value_a)as value_a, SUM(measure_lists.value_b)as value_b, SUM(measure_lists.value_c)as value_c, measure.company_id"))
			->leftJoin("measure_lists","measure_lists.measure_id","=","measure.id")
			->whereRaw('measure_lists.created_at BETWEEN curdate() - weekday(curdate()) AND curdate() - weekday(curdate()) + 7')
			->get();

	
	
		print_r($measures);
		
		
		
	//		return view('graph', ['measures' => $measures,'user'=> $user]);	
	}

   

    


	
	
	
	
   
	
	


}   
