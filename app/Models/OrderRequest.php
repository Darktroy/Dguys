<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    

    protected $fillable = [
                  'user_id',
                  'estimated_price_by_client',
                  'order_description',
                  'status',
                  'delivery_price',
                    'money_changes_id',
                    'discount_code'
              ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function moneyChanges()
    {
        return $this->hasOne('App\Models\MoneyChanges','money_changes_id');
    }

    public function discountCodes()
    {
        return $this->hasOne('App\Models\DiscountCode','discount_code','dicount_code');
    }
    
    public function statusRelation() {
//        $this->hasOne($related, $foreignKey, $localKey)
        return $this->hasOne('App\Models\OrderState', 'status_id','status');
    }
    
    public function OrderPickDropRel() {
                return $this->hasOne('App\Models\OrderPickDrop', 'OrderRequest_id','id');

    }



}
