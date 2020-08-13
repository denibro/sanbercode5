<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TagJawaban extends Model
{
     protected $guarded = [];
    protected $table = 'tag_jawabans';
    // protected $primaryKey = 'id';
    public $timestamps = false;
}