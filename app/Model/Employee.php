<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    
    protected $table = 'Employees';

    protected $fillable = [
        
		'employee_name','employee_email','company_id'
    ];

    
    /*
    protected $hidden = [
        'password', 'remember_token',
    ];
	*/
}
