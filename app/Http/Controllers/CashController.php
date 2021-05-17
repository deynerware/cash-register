<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Merqueo\Cash;
use Merqueo\Services\Cashier;

class CashController extends Controller
{
    private $cashier;

    public function __construct()
    {
        $this->cashier = new Cashier;
    }

    public function index()
    {
        return $this->cashier->getMoneyBase();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Cash::enterCash($data['denomination'], $data['amount']);
    }

    public function emptyCash()
    {
        $this->cashier->emptyRegisterCash();

        return $this->getAllCash();
    }

    public function payment(Request $request)
    {
        $data = $request->all();

        return $this->cashier->payment($data['denomination'], $data['productPrice']);
    }

    public function getAllCash()
    {
        return $this->cashier->totalCash();
    }

    public function cashLog()
    {
        //
    }

    public function log()
    {
        //
    }
}
