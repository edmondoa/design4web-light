<?php

//use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

Route::post('/users/login','Auth\LoginController@check_login');
Route::get('/demo',function(){
	echo 'demo';
});


Route::get('/', function () {     
		   return view('home');
	  });


Route::get('/home', function () {     
		   return view('home');
	  });

Route::get('/dashboard', function () {  
	if(!\Auth::check()){
		return redirect ('/login');
	}
	
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
	
	  });


Route::get('auth/login','Auth\LoginController@loginForm');


Route::get('/login-form', function (Request $request) {
	if(!\Auth::check()){
		return view ('form.login');
	}
	
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
	
	
});


Route::get('/logout/',function (Request $request) {

	Auth::logout();
	return redirect ('/login/');
	});


Route::get('/register/', function () {
	  if(!\Auth::check()){
         
		  return view('form/register');
	  } else {
	  return redirect ('/products');
	  }
	
});

Route::get('/demotest',function(){
	\App\User::create(['username'=>'demo','password'=>\Hash::make("123456"),'level'=>'admin']);
});

Route::get('/graphtest',function(){
	return view('graph_demo');
});

//Manuel inserted this, please excuse him, he is a newbie in laravel... =)
Route::get('/forgot',function(){
	return view('form.forgot');
});


//************************
//** Company ********
//************************


Route::get('/company/create', function (Request $request) {
	if(!\Auth::check() || (Auth::user()->level) != 'admin'){
		Auth::logout();
		return view ('form.login');
	}
	return view ('form.create-company');
});

Route::post('/company/create', 'CompanyController@create');
Route::get('/company/lists', 'AdminController@lists');
Route::get('/company/view-measure', 'CompanyController@view_measure');

Route::get('/company/edit/{id}', 'AdminController@edit_company');
Route::get('/company/delete', 'AdminController@delete_company');
Route::get('/company/employees/{id}', 'AdminController@company_employees');
Route::post('/company/employee/delete', 'AdminController@employees_delete');
Route::post('/company/employee/history','CompanyController@company_disp_emp_measure');

//************************


//************************
//** Employee ********
//************************

Route::get('/employee/create', function (Request $request) {
	if(!\Auth::check() || (Auth::user()->level) != 'company'){
		Auth::logout();
		return view ('form.login');
	}
		return view ('form.create-employee');
	});

Route::post('/employee/create', 'EmployeeController@create');
Route::post('/employee/create_test', 'EmployeeController@create_test');



//************************
//login
Route::get('/dashboard-employee', 'EmployeeController@dashboard_employee');
Route::get('/dashboard-company', 'CompanyController@dashboard_company');
Route::get('/dashboard-admin', 'AdminController@dashboard_admin');




//************************
//** Measure ********
//************************

Route::get('/measure/company', 'MeasureController@view_company_graph');
Route::get('/measure/employee', 'MeasureController@view_employee_measure');

Route::get('/measure/emp_history', 'EmployeeController@disp_emp_measure');

Route::get('/measure/view', 'MeasureController@view_graph');

Route::get('/measure/create', function (Request $request) {
	if(!\Auth::check()){
		return view ('form.login');
	}
	return view ('form.create-measure');
});


Route::post('/measure/create', 'MeasureController@create');
Route::post('/measure/edit', 'MeasureController@edit_measure');
Route::post('/measure/update', 'MeasureController@update_measure');



Route::get('/employee/measure', 'EmployeeController@disp_measure');
Route::post('/employee/measure', 'EmployeeController@create_measure');

Route::get('/employee/lists', 'CompanyController@lists_employees');

Route::get('/employee/edit/{id}', 'EmployeeController@edit_employees');
Route::post('/employee/update', 'EmployeeController@update_employees');
Route::post('/employee/delete', 'EmployeeController@delete_employees');

Route::get('/graph/employee', 'EmployeeController@disp_graph');
Route::get('/graph/company', 'CompanyController@disp_graph');
Route::get('/graph/admin', 'UsersController@disp_graph');

Route::get('/graph/gen-emp', 'CompanyController@gen_employee_graph');
Route::get('/graph/gen-c', 'CompanyController@gen_company_graph');
Route::post('/graph/gen-emp', 'CompanyController@disp_employee_graph');
Route::post('/graph/gen-c', 'CompanyController@disp_company_graph');

Route::get('/admin/graph', function(Request $request){
	return view('form.gen_admin_graph');
});

Route::post('/admin/graph', 'AdminController@disp_admin_company_graph');




