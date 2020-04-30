<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//$table->text('permissions') // {"create-post": true}
// protected $casts = ['permissions' => 'array'];
// $user = User::first();
// dd($user->permissions) // array
// $user->permissions = ['create-post' => true];
// $user->save() // take the permissions, json_encode, store in database.
class DeliveryGuyDetail extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'address',
        'is_citizen',
        'national_card_serial',
        'national_card_image',
        'license_image',
        'city',
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
