<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index()
    {
        return Cash::all();
    }

    public function store(Request $request)
    {
        Cash::create($request->all());
    }

    public function loadCash()
    {
        //
    }

    public function emptyCash()
    {

    }

    public function makePayment(Request $request)
    {

    }

    public function cashStatus()
    {

    }

    public function cashLog()
    {

    }

    public function log()
    {
        //
    }
}
