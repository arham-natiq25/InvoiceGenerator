<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceGenerateController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
    }
}
