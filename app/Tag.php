<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bun;

class Tag extends Model
{
    /**
     * gets all buns with this tag
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagProducts()
    {
        return $this->hasMany('App\Product_tag', 'tag_id', 'id');
    }

}
