<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    

    protected $fillable = [
                  'bank_name_ar',
                  'bank_name_en'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}
