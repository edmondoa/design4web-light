<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\User;
use Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;


class UsersController extends Controller
{
    //

    
    public function loginForm()
    {
        return view("form.login");
    }

    public function index()
    {
	 
   
    }


    public function create(Request $request)
    {
    	
    $user = new User;

	$birthday = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
	
	
	 $birthDate = $request->input('month') .'/' . $request->input('day').'/'.$request->input('year');
  //explode the date to get month, day and year
  	$birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
 	$age_calc = $age; 	
		
		
		
	
    $user->name = $request->input('name');
    $user->adress = $request->input('address');
    $user->sex = $request->input('gender');
	$user->age = $age_calc;
	$user->birthday = $birthday;
    $user->email = $request->input('email');
    $user->region = $request->input('region');
    $user->country = $request->input('country');
    $user->tlf = $request->input('tlf');
    $user->tilmed = $request->input('tilmed');
	$user->action = 'inactive';
    $user->password = Hash::make($request->input('password'));              
    $user->save();

	$red = '/account/activate/?email='.$request->input('email');	
    return  redirect($red);

    }



    public function forgotpassword()
    {

    $id = Input::get('id');
    $user = User::find($id);
    $user->password = ''; //set 

    }
   

    public function disp_users(){


    	if(!Auth::check()) {
			return redirect('/login');
		}else {	

       	$main_role = (object) array(
          'main_role' => Auth::user()->role
          );

     
        $users = db::select('select * from users where role="user"');

        return view('userlists',array(
            'users' => $users,
            'main_role' => $main_role

            ));

          }
        

        }

    public function user_action(){

        $act = $_GET['act'];
        $id = $_GET['i'];


        if($act == 'delete'){

            $users = db::table('users')
                    ->where('id','=',$id)
                    ->delete();
        }


        if($act == 'suspend'){
            
            $users = db::table('users')
                    ->where('id','=',$id)
                    ->update(['action' => 'suspend' ]);
        }

        return redirect('/admin/users');


    }


    public function activity(){


   		if(!Auth::check()) {
			return redirect('/login');
		} else  {

       $main_role = (object) array(
          'main_role' => Auth::user()->role
          );

     
        $users = db::select('select a.user_id, a.prod_id, b.name, p.product_name, p.url_alias from activity as a left join users as b on a.user_id = b.id left join products as p on a.prod_id = p.id');



        return view('activity',array(
            'users' => $users,
            'main_role' => $main_role

            ));

            }


    }


    public function save_activity(){
        $product_id = '20';
        $product_name = 'Shampoo';
        $msg = 'share the product '.$product_name.' view product <a href="/product/'.$product_id.'">here</a>';
    
        echo $msg;
    
    }


    public function dashboard(){
     
		if(\Auth::check()){
			 return view('admin_dashboard',array(  
                'main_role' => \Auth::user()->role)

            );
		}
		return redirect('/login');
        
        
      
    }


    public function tools(Request $request){

  
        }
	
	
	public function testview(){
	   return view('regsuccess');
	}
	
	
	
	
	
	
	
	public function activate_reg(Request $request)
	{
	  //activate reg
		//echo $_GET['email'];
		
		$email = $_GET['email'];
		$users = db::table('users')
                    ->where('email','=',$email)
                    ->update(['action' => 'active' ]);
	
		return view('form.Activation_success');
	}
	
	
	
	
	public function update_password(Request $request){
	
		$new_pass = $request->input('password');
		
		$new_password = Hash::make($new_pass);
		
		$email = $request->input('email');
		
		$users = db::table('users')
                    ->where('email','=',$email)
                    ->update(['password' => $new_password ]);
		
		 return view('emails.newpassword_success');
	
		
		
		 
	}
	
    public function new_password(){
		
		 return view('emails.newpassword_form');
		/*
		$new_password = Hash::make("123456");
		
		$email = $_GET['email'];
		 $users = db::table('users')
                    ->where('email','=',$email)
                    ->update(['password' => $new_password ]);
		 return redirect('/login');
		 */
        }

   
	public function updatepassword_form(Request $request){
		 
	//show form 
		
	  $users = (object) array(
          'id' => $request->input('id')
          );

		
		 return view('form.replacepassword',array(
            'users' => $users
            ));
		
	
	}
	
	public function update_password_now(Request $request)
	{
		$new_pass = $request->input('password');
		$id = $request->input('id');
		
		$new_password = Hash::make($new_pass);
			
		$users = db::table('users')
                    ->where('id','=',$id)
                    ->update(['password' => $new_password ]);
		
		 return view('emails.newpassword_success');

	}
	
	public function updateaccount_form(Request $request)
	{
			
		 $id = $request->input('id');
   		$users = User::find($id);
			
		
		 return view('form.accountedit',array(
            'users' => $users
            ));
		
	}
	
	
	public function update_accountinfo_now(Request $request)
	{
		
	

	$birthday = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
	
	
	 $birthDate = $request->input('month') .'/' . $request->input('day').'/'.$request->input('year');
  //explode the date to get month, day and year
  	$birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
 	$age_calc = $age; 	
		
	
	$users = db::table('users')
                    ->where('id','=',$request->input('id'))
                    ->update(['name' => $request->input('name') ],['adress' => $request->input('address') ],['sex' => $request->input('gender') ],['birthday' =>  $birthday ],['age' =>  $age_calc ],['region' => $request->input('region') ],['country' => $request->input('country') ],['tlf' => $request->input('tlf') ],['tilmed' => $request->input('tilmed') ]);
		 			
	return redirect('/account/info');

		
	}
	
	
	public function disp_graph(){
	

		
		return view('graph.admin');
	}
   
	
	

	
	

}   
