<?php

namespace Tests\Unit\Services;

use Merqueo\Cash;
use Tests\TestCase;
use Merqueo\Services\Cashier;

class CashierTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Cash::enterCash(100000, 2);
        Cash::enterCash(50000, 4);
        Cash::enterCash(20000, 2);
        Cash::enterCash(5000, 4);
    }

    /** @test */
    public function can_enter_money_base()
    {
        $cashier = new Cashier;

        $result = $cashier->getMoneyBase();

        $expected = [
            100000 => 2,
            50000  => 4,
            20000  => 2,
            5000   => 4,
        ];

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function can_receive_a_payment_and_return_bills()
    {
        $cashier = new Cashier;

        $result = $cashier->payment(50000, 10000);
        $expected = [20000 => 2];

        $this->assertEquals($expected, $result);
    }


    /** @test */
    public function can_see_how_much_money_is_in_the_cash_register()
    {
        $cashier = new Cashier;

        $result = $cashier->totalCash();

        $expected = 460000;

        $this->assertEquals($expected, $result['total']);
    }

    /** @test */
    public function can_whitdraw_all_the_money_from_the_cash_register()
    {
        $cashier = new Cashier;

        $cashier->emptyRegisterCash();

        $result = $cashier->getMoneyBase();
        $expected = [];

        $this->assertEquals($expected, $result);
    }

}
