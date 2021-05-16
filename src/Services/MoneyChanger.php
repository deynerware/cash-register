<?php

namespace Merqueo\Services;

use Exception;
use Merqueo\Contracts\Changer;

class MoneyChanger implements Changer
{
    protected $money = [];
    protected $denominations;
    protected $amountOfMoney;

    public function __construct(array $denomination, int $amountOfMoney)
    {
        $this->denominations = $denomination;
        $this->amountOfMoney = $amountOfMoney;
    }

    public function change()
    {
        foreach ($this->denominations as $denomination => $amount) {
            if($amount == 0) continue;

            $this->saveMoney($denomination);
        }

        if ($this->amountOfMoney > 0) {
            throw new Exception('There is no cash to make the change');
        }

        return $this->getMoney();
    }

    public function saveMoney(int $denomination)
    {
        $bills = intval($this->amountOfMoney / $denomination);
        $this->amountOfMoney = $this->amountOfMoney - ($denomination * $bills);
        $this->setMoney($denomination, $bills);
    }

    public function setMoney(int $denomination, int $bills)
    {
        $this->money[$denomination] = $this->onlyPositiveValue($bills);
    }

    private function onlyPositiveValue(int $number): int
    {
        return $number < 0 ? 0 : $number;
    }

    public function getMoney(): array
    {
        foreach($this->money as $key => $value) {
            if ($value == 0) unset($this->money[$key]);
        }

        return $this->money;
    }
}
