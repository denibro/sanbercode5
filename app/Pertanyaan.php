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
    public function tag()
    {
        return $this->hasMany('App\Tags','pertanyaan_id');
    }
    public function tags()
    {
    	return $this->belongsToMany('App\Tags', 'tanya_tags', 'pertanyaan_id', 'tag_id');
    }
}
