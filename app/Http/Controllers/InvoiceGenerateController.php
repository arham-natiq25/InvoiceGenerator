<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import the DOMPDF facade

class InvoiceGenerateController extends Controller
{
    public function index(Request $request)
    {
        $product_names = $request->product_name;
        $qtys = $request->qty;
        $product_single_prices = $request->product_single_price;
        $product_total_prices = $request->product_total_price;
        $packings = $request->product_packing;
        $ltrs = $request->product_litre;

        // Initialize the products array
        $products = [];

        // Loop through the arrays and create objects
        foreach ($product_names as $index => $product_name) {
            $products[] = [
                'name' => $product_name,
                'qty' => $qtys[$index],
                'litre' => $qtys[$index] * $ltrs[$index],
                'single_price' => $product_single_prices[$index],
                'total_price' => $product_total_prices[$index],
            ];
        }

        $data = [
            'invoiceNo' => $request->invoice_no,
            'date' => Carbon::parse($request->date)->format('d F, Y'),
            'buyer_name' => $request->buyer_name,
            'buyer_phone' => $request->buyer_phone,
            'buyer_address' => $request->buyer_address,
            'sumoFTotalPrice' => $request->sum_of_total_price,
            'productData' => $products,
        ];

        // Directory for invoices
        $invoiceDir = public_path('invoices');

        // Check if directory exists, otherwise create it
        if (!is_dir($invoiceDir)) {
            mkdir($invoiceDir, 0777, true); // Create the directory with recursive option
        }

        // Generate PDF from view
        $pdf = Pdf::loadView('print', compact('data'));

        // Save PDF to public/invoices
        // $pdfFilePath = $invoiceDir . "/{$data['invoiceNo']}.pdf";
        // $pdf->save($pdfFilePath);

        // Download the PDF file
        return $pdf->download("Invoice-{$data['invoiceNo']}.pdf");
    }
}
