<?php

namespace Merqueo\Services;

use Merqueo\Cash;
use Merqueo\Logs\Facades\FileLogger;
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

        $bills = $moneyChanger->change();

        Cash::enterCash($denomination);
        FileLogger::info("Se Ingreso un billete de $denomination");

        Cash::substractCash($bills);

        return $bills;
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

    public function substractCash($denomination, $amount)
    {
        Cash::substractCash($denomination, $amount);

        FileLogger::info("Se retiraron $amount billetes de $denomination");
    }

    public function getMoneyBase()
    {
        return Cash::all();
    }
}
