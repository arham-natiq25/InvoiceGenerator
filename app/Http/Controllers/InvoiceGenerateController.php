<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceGenerateController extends Controller
{
    public function index(Request $request)
    {
        $product_names = $request->product_name;
        $qtys = $request->qty;
        $product_single_prices = $request->product_single_price;
        $product_total_prices = $request->product_total_price;
        $packings = $request->product_packing;

        // Initialize the products array
        $products = [];

        // Loop through the arrays and create objects
        foreach ($product_names as $index => $product_name) {
            $products[] = [
                'name' => $product_name,
                'qty' => $qtys[$index],
                'packing'=>$packings[$index],
                'single_price' => $product_single_prices[$index],
                'total_price' => $product_total_prices[$index],
            ];
        }

        $data = [
            'invoiceNo' => $request->invoice_no,
            'date' => $date = Carbon::parse($request->date)->format('d F, Y'),
            'buyer_name' => $request->buyer_name,
            'buyer_phone' => $request->buyer_phone,
            'buyer_address' => $request->buyer_address,
            'sumoFTotalPrice' => $request->sum_of_total_price,
            'productData' => $products,
        ];


        // dd($data);
        return view('print',compact('data'));
    }
}
