<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverToRequest extends Model
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
                  'driver_id','device_id',
                  'OrderRequest_id',
                  'delivery_price_by_driver',
                  'status'
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
    public function driverdetails()
    {
        return $this->belongsTo('App\Models\User','driver_id');
    }

    public function theorder()
        {
            return $this->belongsTo('App\Models\OrderRequest','OrderRequest_id');
        }

}
