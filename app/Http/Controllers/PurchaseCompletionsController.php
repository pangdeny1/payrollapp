<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseCompletionsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function store(Purchase $purchase)
    {
        $purchase->update(["status" => "completed"]);

        return redirect()->back();
    }
}
