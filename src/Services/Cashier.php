<?php

namespace Merqueo\Services;

use Merqueo\Cash;
use Merqueo\Services\MoneyChanger;

class Cashier
{
    protected $bills;
    protected $denomination;

    public function payment(int $denomination, int $priceProduct)
    {
        $change = $denomination - $priceProduct;

        $denominations = Cash::all();

        $moneyChanger = new MoneyChanger($denominations, $change);

        //$this->withdrawCash($moneyChanger->change());

        Cash::enterCash($denomination);

        return $moneyChanger->change();
    }

    public function totalCash()
    {
        $total = 0;

        foreach (Cash::all() as $key => $value) {
            $total += $key * $value;
        }

        return ['total' => $total];
    }

    public function emptyRegisterCash()
    {
        Cash::emptyCash();
    }

    public function withdrawCash(array $bills)
    {
        Cash::drawoutCash($bills);
    }

    public function getMoneyBase()
    {
        return Cash::all();
    }
}
