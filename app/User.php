<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = array('id'); 

    public static $rules = array(
        'name' => 'required|min:3',
        'description' => 'max:150',
        'email' => 'required|email',
    );

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}