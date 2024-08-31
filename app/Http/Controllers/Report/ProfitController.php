<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function monthlyProfitIndex()
    {
        return view('profit.monthly_profit');
    }
}
