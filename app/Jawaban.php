<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $guarded = [];

    public function tags()
    {
    	return $this->belongsToMany('App\Tags', 'jawab_tags', 'jawaban_id', 'tag_id');
    }
}
