<?php

namespace Tests\Unit\Services;

use Merqueo\Cash;
use Tests\TestCase;
use Merqueo\Services\ArrayCashReceiver;

class ArrayCashReceiverTest extends TestCase
{
    /** @test */
    public function can_receive_money()
    {
        ArrayCashReceiver::set(50, 30);

        $cash = Cash::all();

        $this->assertEquals($cash[50], 30);
    }

}
