<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Product;
use Response;


class HomeControllers extends Controller
{
    //
	

    public function index()
    {
	  if (Auth::check()) {
          $roles =(object) array(
            'type' => 'admin'
            );

        }else {
           $roles =(object) array(
            'type' => 'guest'
            );
		  
        }
      

        $product = Product::all();

        return view('products.index',array(
        'product' => $product,
        'roles' => $roles
        ));


   
    }



}
