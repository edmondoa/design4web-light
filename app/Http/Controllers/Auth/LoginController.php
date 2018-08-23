<?php 
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    public function loginForm()
    {
        return view("form.login");
    }

     public function check_login(Request $request){


    if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
    {
        $user = auth()->user();       
	//	echo 'success';	
		$level = auth()->user()->level;
		switch($level){
		
			case 'employee':
				$ret = '/dashboard-employee';
				break;
			case 'company':
				$ret = '/dashboard-company';
				break;
			case 'admin':
				$ret = '/dashboard-admin';
				break;
		
		}
		
		return redirect($ret);
		
    }else{
        return back()->with('error','your username and password are wrong.');
    }

		

    }
            
    


}
