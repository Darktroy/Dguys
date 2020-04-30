<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_states';

    /**
   
     */
    protected $fillable = [
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
        return $this->belongsTo('App\Models\OrderRequest','status_id','status');
//        $this->belongsTo($related, $foreignKey, $ownerKey);
    }


}
