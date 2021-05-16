<?php

namespace Tests\Unit\Services;

use Merqueo\Services\MoneyChanger;
use Tests\TestCase;

class MoneyChangerTest extends TestCase
{
    protected $money;

    public function setUp(): void
    {
        parent::setUp();

        $this->money = [
            100000  => 0,
            50000   => 1,
            20000   => 1,
            10000   => 1,
            5000    => 0,
            2000    => 0,
            1000    => 1,
            500     => 0,
            200     => 0,
            100     => 0,
            50      => 0,
        ];
    }


    /** @test */
    public function can_change_an_amount_of_money_into_a_number_of_bills()
    {
        $expected = [
            20000 => 1,
            10000 => 1
        ];

        $changer = new MoneyChanger($this->money, 30000);

        $result = $changer->change();

        //$result = $changer->getMoney();

        $this->assertEquals($expected, $result);

    }

}
