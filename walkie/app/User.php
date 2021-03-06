<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'user_name', 'phone_number', 'age', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dogs()
    {
        return $this->belongsToMany('\App\Dog', 'walks');
    }

    public function walks()
    {
        return $this->hasMany('App\Walk');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
