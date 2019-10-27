<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bun;
use Order;

class Order_list extends Model
{
    /**
     * retrns all buns in order list
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bun()
    {
        return $this->belongsTo('App\Bun', 'bun_id', 'id');
    }

    /**
     * retrns all order in order list
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
