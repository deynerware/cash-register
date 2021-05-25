<?php

namespace App\Http\Controllers;

use Merqueo\Cash;
use Illuminate\Http\Request;
use Merqueo\Traits\ResponseJson;
use Merqueo\Services\Cashier;

class CashController extends Controller
{
    use ResponseJson;

    private $cashier;

    public function __construct()
    {
        $this->cashier = new Cashier;
    }

    public function index()
    {
        $data = $this->cashier->getMoneyBase();

        return $this->sendOk($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Cash::enterCash($data['denomination'], $data['amount']);

        return $this->sendOk($data);
    }

    public function emptyCash()
    {
        $this->cashier->emptyRegisterCash();

        return $this->sendOk(['result' => 'The box was emptied']);
    }

    public function payment(Request $request)
    {
        $data = $request->all();
        $payment = $this->cashier->payment($data['denomination'], $data['productPrice']);

        return $this->sendOk($payment);
    }

    public function getAllCash()
    {
        $allCash = $this->cashier->totalCash();

        return $this->sendOk($allCash);
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
