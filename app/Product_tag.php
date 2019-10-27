<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bun;
use Tag;

class Product_tag extends Model
{
    public function bun()
    {
        return $this->belongsTo('App\Bun', 'bun_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }
}
