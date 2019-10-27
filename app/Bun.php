<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product_tag;
use Order_list;
use Tag;

class Bun extends Model
{
    /**
     * gets all tags for bun
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bunTags()
    {
        return $this->hasMany('App\Product_tag', 'bun_id', 'id');
    }

    /**
     * gets all orders for bun
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bunOrders()
    {
        return $this->hasMany('App\Order_list', 'bun_id', 'id');
    }
}
