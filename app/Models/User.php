<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'mobile', 'active', 'profile_image','device_id','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function generateAuthToken()
    {
        return \JWTAuth::fromUser($this);
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return mixed
     */
    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'user_id', 'id');
    }

    /**
     * @param $value
     * @param $field
     * @return mixed
     */
    public function resolveRouteBinding($value, $field = null)
    {
        // validate against mobile pattern
        if (preg_match('...')) {
            return $this->whereMobile($value)->firstOrFail();
        }

        return $this->whereId($value)->firstOrFail();
    }
}
