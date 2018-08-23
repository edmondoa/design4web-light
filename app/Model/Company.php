<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    
    protected $table = 'Company';

    protected $fillable = [
        
		'company_name','company_email','company_status'
    ];

    
    /*
    protected $hidden = [
        'password', 'remember_token',
    ];
	*/
}
