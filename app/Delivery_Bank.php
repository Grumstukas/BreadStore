<?php


namespace App;


class Delivery_Bank
{
    private $delivery_info = [
        1 => ['how' => 'Atsiimsiu pats', 'when' => 'Jeigu prekė yra sandėlyje, atsiėmimas tą pačią darbo dieną.', 'price' => 0],
        2 => ['how' => 'Kurjeriai "Venipak', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 1],
        3 => ['how' => 'OMNIVA paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 2],
        4 => ['how' => 'LP Express 24 paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 3],
        5 => ['how' => 'Lietuvos paštas', 'when' => 'Pristatymas per 4-5 d.d.', 'price' => 4],
        6 => ['how' => 'DPD paštomatai', 'when' => 'Pristatymas per 1 - 2 d.d.', 'price' => 5]
    ];

    private $bank_info = [
        7 => ['name' => 'Swedbank', 'img' => 'swedbank.png'],
        8 => ['name' => 'SEB', 'img' => 'seb.png'],
        9 => ['name' => 'LKU', 'img' => 'lku.png'],
        10 => ['name' => 'Medicinos Bankas', 'img' => 'mb.png'],
        11 => ['name' => 'Šiaulių Bankas', 'img' => 'sb.png'],
        12 => ['name' => 'Luminor DNB', 'img' => 'luminor_d.png'],
        13 => ['name' => 'Danske Bank', 'img' => 'danske.png'],
        14 => ['name' => 'Luminor Nordea', 'img' => 'luminor_n.png'],
        15 => ['name' => 'Citadele', 'img' => 'citadele.png'],

        16 => ['name' => 'Paysera', 'img' => 'paysera.png']
    ];

    /**
     * @return array
     */
    public function getDeliveryPrice($number): int
    {
        return $this->delivery_info[$number]['price'];
    }

    /**
     * @return array
     */
    public function getDeliveryInfo(): array
    {
        return $this->delivery_info;
    }


    /**
     * @return array
     */
    public function getBankInfo(): array
    {
        return $this->bank_info;
    }


}
