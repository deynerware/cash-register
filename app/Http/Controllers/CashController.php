<?php

namespace App\Http\Controllers;

use Merqueo\Cash;
use Illuminate\Http\Request;
use Merqueo\Traits\Response;
use Merqueo\Services\Cashier;
use Illuminate\Http\ResponseTrait;

class CashController extends Controller
{
    use Response;

    private $cashier;

    public function __construct()
    {
        $this->cashier = new Cashier;
    }

    public function index()
    {
        $data = $this->cashier->getMoneyBase();

        $this->sendOk($data);
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
