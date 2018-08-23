<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    
    
    protected $table = 'measure';

    protected $fillable = [       
		'id','company_id','measure_a','measure_b','measure_c','status'
    ];

    
    /*
    protected $hidden = [
        'password', 'remember_token',
    ];
	*/
}
