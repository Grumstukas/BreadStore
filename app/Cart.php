<?php


namespace App;

use App\Bun;
use Session;

class Cart
{
    private static $cart;

    public static function get()
    {
        return self::$cart ?? self::$cart = new self;
    }

    public function __construct()
    {
        $this->data = Session::get('cart', []);
    }

    private function updateSession()
    {
        Session::put('cart', $this->data);
    }

    public function add($id, $amount)
    {
        $bun = Bun::where('id', $id)->first();

        if (!$bun)
        {
            return false;
        }
        if (isset($this->data[$id]))
        {
            $this->data[$id] += $amount;
        }
        else
        {
            $this->data[$id] = $amount;
        }

        $this->updateSession();
        return true;
    }

    public function update($id, $amount)
    {
        $bun = Bun::where('id', $id)->first();
        if (!$bun)
        {
            return false;
        }

        if ($amount == 0)
        {
            unset($this->data[$id]);
        }
        else
        {
            $this->data[$id] = $amount;
        }
        $this->updateSession();
        return true;
    }

    public function remove($id)
    {
        $bun = Bun::where('id', $id)->first();
        if (!$bun)
        {
            return false;
        }
        unset($this->data[$id]);
        $this->updateSession();
        return true;
    }

    public function count()
    {
        return array_sum($this->data);
    }

    public function totalCartSum()
    {
        $totalCartSum = 0;

        foreach($this->data as $bunID => $amount)
        {
            $bun = Bun::where('id', $bunID)->first();

            if($bun->price_discount == null)
            {
                $totalCartSum += ($bun->price * $amount);
            }
            else
            {
                $totalCartSum += ($bun->price_discount * $amount);
            }
        }
        return $totalCartSum;
    }

    public function delete()
    {
        Session::flush();
    }




}

