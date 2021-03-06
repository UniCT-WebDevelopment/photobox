<?php

namespace App;

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
        'name', 'cognome', 'nickname', 'dataNascita',
        'email', 'password', 'bio', 'imgProfilo',
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

    public function photos()
    {
        return $this->hasMany('App\Photo', 'idUtente');
    }

    public function voti()
    {
        return $this->hasMany('App\Voto', 'idUtente');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
            $user->photos()->delete();
            $user->voti()->delete();
        });
    }
}