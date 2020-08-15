<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    protected $guarded = [];


    public function jawaban()
    {
        return $this->hasMany('App\Jawaban','pertanyaan_id');
    }
    
}
