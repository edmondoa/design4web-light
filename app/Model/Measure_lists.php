<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure_lists extends Model
{
     
    protected $table = 'measure_lists';

    protected $fillable = [       
		'measure_id','value_a','value_b','value_c'
    ];

    

}
