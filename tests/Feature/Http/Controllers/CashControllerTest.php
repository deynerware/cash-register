<?php

namespace Tests\Feature\Http\Controllers;

use Merqueo\Cash;
use Tests\TestCase;
use Merqueo\Services\Cashier;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CashControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Cash::enterCash(50000, 2);
        Cash::enterCash(10000, 5);
    }

    /** @test */
    public function can_store_cash_into_cash_register()
    {
        $data = [
            'denomination'  => 50000,
            'amount'        => 2
        ];

        $this->post('/api/cash', $data);

        $cashier = new Cashier;

        $this->assertEquals($cashier->getMoneyBase(), [50000 => 2, 10000 => 5]);
    }

    /** @test */
    public function can_show_register_cash()
    {
        $response = $this->get('/api/cash');

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => [
                    50000 => 2,
                    10000 => 5,
                ],
                'code' => 200,
            ]);
    }

    /** @test */
    public function can_make_payment()
    {
        $this->withoutExceptionHandling();
        $data = [
            'denomination' => 50000,
            'productPrice' => 10000,
        ];

        $response = $this->post('/api/payment', $data);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => [
                    10000 => 4
                ],
                'code' => 200,
            ]);
    }

    /** @test */
    public function can_show_total_register_cash()
    {
        $response = $this->get('/api/cash/all');

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => [
                    'total' => 150000
                ],
                'code' => 200,
            ]);
    }

    /** @test */
    public function can_empty_the_register_cash()
    {
        $response = $this->get('/api/cash/empty');

        $response->assertStatus(200)
        ->assertJson([
            'status' => true,
            'data' => [
                'result' => 'The box was emptied'
            ],
            'code' => 200,
        ]);
    }
}
