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

        Cash::emptyCash();
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

    /** @test */
    public function can_throw_an_exception_when_entering_a_wrong_denomination()
    {
        $this->expectException(\Exception::class);

        Cash::enterCash(60, 30);
    }

    /** @test */
    public function can_throw_an_exception_when_get_a_wrong_denomination()
    {
        $this->expectException(\Exception::class);

        Cash::getCash(80);
    }

    /** @test */
    public function can_drawout_an_element_of_the_cash_array()
    {
        Cash::enterCash(50, 30);
        Cash::enterCash(100, 30);

        Cash::drawoutCash([50 => 10, 100 => 20]);

        $cash = Cash::all();

        $this->assertEquals($cash[50], 20);
        $this->assertEquals($cash[100], 10);
    }

}
