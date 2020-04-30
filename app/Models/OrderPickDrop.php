<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPickDrop extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'OrderRequest_id',
                  'shop_name',
                  'shop_latitude',
                  'shop_longitude',
                  'shop_address',
                  'drop_latitude',
                  'drop_longitude',
                  'drop_address'
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
    public function order()
    {
        return $this->belongsTo('App\Models\OrderRequest','OrderRequest_id');
//        return $this->belongsTo($related, $foreignKey) ;
//        $this->hasOne($related, $foreignKey)
    }



}
