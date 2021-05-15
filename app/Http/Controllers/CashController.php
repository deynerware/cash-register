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
}
