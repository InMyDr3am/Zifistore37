<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function index(Buyer $model)
    {
        $buyers = $model->getAllData();
        return view('buyers.index', compact('buyers'));
    }
}
