<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            position: relative;
            text-align: center;
        }
        .card {
            margin-top: 30px;
        }
        .fw-bolder {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 20px;
        }
        .bed {
            margin-left: 10%;
            margin-right: 10%;
        }
        .data {
            border-bottom: 1px solid #000;
            padding: 5px;
        }
        .lg-size {
            font-size: 12px;
        }
        .end-name {
            font-size: 14px;
            font-weight: 500;
            margin-left: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed; /* Ensures columns respect width settings */
        }
        table th, td {
            font-size: 12px;
        }
        table th, table td {
            border: 1px solid black;
            padding: 5px;

            text-align: center;
            overflow-wrap: break-word; /* Ensures content wraps within columns */
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        table th:nth-child(2), table td:nth-child(2) {
            width: 50%; /* Wider column for Product Name */
        }
        table th:not(:nth-child(2)), table td:not(:nth-child(2)) {
            width: 15%; /* Narrower columns for other fields */
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-amount {
            float: right;
            margin-top: 20px;
        }
        .signature {
            float: left;
            margin-top: 40px;
        }
        hr {
            border: 1px solid black;
        }

        /* Contact Info Adjustment using position */
        .contact-info {

            position: absolute;
            right: 100px;
            top: 10px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div>
    <div class="card">
        <div class="header">
            <img src="/logo.png" width="130px" alt="Logo">
            <div class="fw-bolder">
                NEW HASHIR OIL TRADERS
            </div>
            <div class="fw-bolder">
                Qaim Sain Darbar Road, Faizabad, Faisalabad Street No 11.
            </div>
            <!-- Contact Info positioned absolutely to the top-right -->
            <div class="contact-info">
                <p>Name :<strong>Sajjad Servar</strong></p>
                <p>Contact: <strong>03006356783</strong> </p>
                <p>Contact: <strong>03268668282</strong> </p>
            </div>
        </div>
    </div>
    <div class="bed">
        <hr>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <p class="lg-size"> <strong>Invoice No :</strong> <span class="data"> {{$data['invoiceNo']}} </span> </p>
            </div>
            <div>
                <p class="lg-size"> <strong>Date :</strong> <span class="data"> {{$data['date']}} </span> </p>
            </div>
            <div>
                <p class="lg-size"> <strong>Buyer's Phone :</strong> <span class="data"> {{$data['buyer_phone']}} </span> </p>
            </div>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <p class="lg-size"> <strong>Buyer's Name :</strong> <span class="data"> {{$data['buyer_name']}} </span> </p>
            </div>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <p class="lg-size"> <strong>Buyer's Address :</strong> <span class="data"> {{$data['buyer_address']}} </span> </p>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product Name</th>
                        <th>Packing</th>
                        <th>Single Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['productData'] as $product )
                    <tr>
                        <td>{{$product['qty']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['packing']}}</td>
                        <td>{{$product['single_price']}}</td>
                        <td>{{$product['total_price']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total-amount" style="display: block">
            <p class="lg-size"> <strong>Total Amount :</strong> <span class="data"> Rs {{$data['sumoFTotalPrice']}} /-</span> </p>

            <p class="lg-size" style="margin-top: 0px;"> <strong>Total Received :</strong> <span class="
                ">__________ </span> </p>

            <p class="lg-size" style="margin-top: 0px;"> <strong>Remaining Bal :</strong> <span class="
                "> __________</span> </p>
        </div>
        <br>
        <div class="signature">
            <p class="lg-size"> <strong>Signature :</strong> <span>_________________________
            <br> <span class="end-name"> NEW HASHIR OIL</span>
            </span> </p>
        </div>
    </div>
</div>
</body>
</html>
