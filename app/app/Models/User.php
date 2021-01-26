<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasRole()
    {
        return $this->role->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function job()
    {
        return $this->hasOne(Job::class);
    }

    public function peyments()
    {
        return $this->hasMany(ZarinpalPeyment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function smscodes()
    {
        return $this->hasMany(SMSCode::class);
    }

    public function features()
    {
        return $this->hasMany(Featured::class);
    }
}
