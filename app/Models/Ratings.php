<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    
    protected $table = 'rating';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'rate_by_user_type',
        'OrderRequest_id',
        'rate',
    ];

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
