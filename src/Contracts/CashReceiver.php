<?php

namespace Merqueo\Contracts;

interface CashReceiver
{
    public function enterCash(int $denomination, int $number): void;
}
