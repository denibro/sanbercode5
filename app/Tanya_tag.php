<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanya_tag extends Model
{
    public function tag()
    {
        return $this->hasMany('App\Tags','tag_id');
    }
}
