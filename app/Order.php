<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Order_list;

class Order extends Model
{
    const DELIVERY_INFO = [
        1 => ['how' => 'Atsiimsiu pats', 'when' => 'Jeigu prekė yra sandėlyje, atsiėmimas tą pačią darbo dieną.', 'price' => 0],
        2 => ['how' => 'Kurjeriai "Venipak', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 1],
        3 => ['how' => 'OMNIVA paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 2],
        4 => ['how' => 'LP Express 24 paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 3],
        5 => ['how' => 'Lietuvos paštas', 'when' => 'Pristatymas per 4-5 d.d.', 'price' => 4],
        6 => ['how' => 'DPD paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 5]
    ];
    /**
     * gets all buns for this order
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderBuns()
    {
        return $this->hasMany('App\Order_list', 'order_id', 'id');
    }
}
