<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
//    protected $table = 'driver_to_requests';

    /**
   
     */
    protected $fillable = [
                  'user_id','dicount_code','is_active',
        'dicount_percentage','discount_amount',
                  'is_individual','is_once',
        'valid_from','valid_to'
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
    
    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }


}
