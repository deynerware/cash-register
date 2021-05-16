<?php

namespace Tests\Unit;

use Merqueo\Cash;
use Tests\TestCase;

class CashTest extends TestCase
{
    protected $cash;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cash = [
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
        ];
    }

    /** @test */
    function can_load_an_array_of_cash()
    {
        Cash::loadCash($this->cash);

        $this->assertEquals($this->cash, Cash::all());
    }

    /** @test */
    public function can_modify_an_element_of_the_cash_array()
    {
        Cash::enterCash(50, 30);

        $cash = Cash::all();

        $this->assertEquals($cash[50], 30);
    }

    /** @test */
    public function can_get_an_element_of_the_cash_array()
    {
        Cash::enterCash(100, 2);
        $cash = Cash::getCash(100);

        $this->assertEquals($cash, 2);
    }

    /** @test */
    public function can_delete_all_elements_of_the_cash_array()
    {
        $cash = Cash::emptyCash();

        $this->assertEmpty($cash);
    }

}
