<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
}
