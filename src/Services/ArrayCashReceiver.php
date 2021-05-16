<?php

namespace Merqueo\Services;

use Merqueo\Cash;
use Merqueo\Services\CashRegister;
use Merqueo\Contracts\CashReceiver;

class ArrayCashReceiver implements CashReceiver
{
    public static function set(int $denomination, int $number)
    {
        Cash::loadCash([
            50      => 0,
            100     => 0,
            200     => 0,
            500     => 0,
            1000    => 0,
            5000    => 0,
            10000   => 0,
            20000   => 0,
            50000   => 0,
            100000  => 0,
        ]);
        (new static)->enterCash($denomination, $number);

    }

    public function enterCash(int $denomination, int $number): void
    {
        if(! $this->inArrayCash($denomination)) {
            throw new \Exception('The entered currency value is not valid');
        }

        Cash::enterCash($denomination, $number);
    }

    private function inArrayCash(int $denomination): bool
    {
        return array_key_exists($denomination, Cash::all());
    }
}
