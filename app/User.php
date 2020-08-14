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

    public function pertanyaan()
    {
        return $this->hasMany('App\Pertanyaan','user_id');
    }
    public function jawaban()
    {
        return $this->hasMany('App\Jawaban','user_id');
    }
    public function vote_pertanyaan()
    {
        return $this->hasMany('App\Vote_pertanyaan','user_id');
    }
    public function vote_jawaban()
    {
        return $this->hasMany('App\Vote_jawaban','user_id');
    }
    public function komen_pertanyaan()
    {
        return $this->hasMany('App\Komen_pertanyaan','user_id');
    }
    public function komen_jawaban()
    {
        return $this->hasMany('App\Komen_jawaban','user_id');
    }
}
