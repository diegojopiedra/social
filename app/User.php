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
        'name', 'email', 'password',
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

    public function tweets() {
        return $this->hasMany('App\Tweet')->orderBy('id', 'DESC');
    }

    public function followers() {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id');
    }

    public function following() {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id');
    }

    public function follow_tweets(){
        return $this->hasManyThrough('App\Tweet', 'App\Follow', 'follower_id', 'user_id', 'id', 'followed_id')->orderBy('id', 'DESC');
    }
}
