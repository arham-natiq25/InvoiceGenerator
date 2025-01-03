<!doctype html>
<html lang="en">

<head>
    <title>Invoice System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
          body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom right, #ffffff, #f9f9fc);
        }

        .card-header {
            background-color: #6c757d;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            padding: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border: 2px solid #ced4da;
            border-radius: 10px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(33, 37, 41, 0.3);
        }

        .btn {
            border-radius: 25px;
            padding: 0.6rem 1.2rem;
        }

        .btn-secondary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }

        .btn-danger {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: white;
            border: none;
        }

        .btn-success {
            background: linear-gradient(to right, #00b09b, #96c93d);
            color: white;
            border: none;
        }

        .btn-warning {
            background: linear-gradient(to right, #f7971e, #ffd200);
            color: white;
            border: none;
        }

        .fw-bold {
            font-weight: 600;
            color: #333;
        }

        textarea {
            resize: none;
        }

        .text-danger {
            text-shadow: 1px 1px 2px #d9534f;
        }

        .item-row {
            background: #f7f9fb;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .remove-item {
            margin-top: 1.7rem;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo {
            width: 100px;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center mt-3">
        <div class="card " style="width: 80%; border: 5px solid black">
            <div class="card-header">
                <img src="/logo.png" class="img-fluid logo" alt="Company Logo">
                <div class="header-title">NEW HASHIR OIL TRADERS</div>
                <small>Qaim Sain Darbar Road, Street No 11 Faizabad, Faisalabad</small>
            </div>
            <div class="card-body">
                <form id="invoice-form" method="POST" action="{{ route('generate-invoice') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <p class="fw-bold">Invoice No :</p>
                            <input type="text" name="invoice_no" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold">Date</p>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold">Buyer's Name</p>
                            <input type="text" name="buyer_name" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold">Buyer's Phone</p>
                            <input type="text" name="buyer_phone" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <p class="fw-bold">Buyer's Address</p>
                            <textarea name="buyer_address" rows="3" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="text-center">
                        <div class="h4 text-danger mt-4 fw-bolder">
                            ITEMS
                        </div>
                    </div>

                    <div id="items-container">
                        <div class="row item-row mb-3">
                            <div class="col-md-1">
                                <p class="fw-bold">Qty</p>
                                <input type="text" name="qty[]" class="form-control qty" min="1"
                                    value="1">
                            </div>
                            <div class="col-md-3">
                                <p class="fw-bold">Product Name</p>
                                <select name="product_name[]" class="form-control">
                                    <option selected value="">Select</option>
                                    <option value="HYDROIL AW 100">HYDROIL AW 100</option>
                                    <option value="HYDROIL AW 68">HYDROIL AW 68</option>
                                    <option value="HYDROIL AW 46">HYDROIL AW 46</option>
                                    <option value="HYDROIL AW 32">HYDROIL AW 32</option>
                                    <option value="CIRCUOIL G 220">CIRCUOIL G 220</option>
                                    <option value="CIRCUOIL G 100">CIRCUOIL G 100</option>
                                    <option value="CIRCUOIL G 68">CIRCUOIL G 68</option>
                                    <option value="CIRCUOIL G 10">CIRCUOIL G 10</option>
                                    <option value="CHILL OIL 68">CHILL OIL 68</option>
                                    <option value="SPINDLE OIL 10">SPINDLE OIL 10</option>
                                    <option value="LOOM OIL">LOOM OIL</option>
                                    <option value="DEO (SAE-30-CD)">DEO (SAE-30-CD)</option>
                                    <option value="DEO (SAE-50-CD)">DEO (SAE-50-CD)</option>
                                    <option value="DEO (15W-40-CI-4) Gold">DEO (15W-40-CI-4) Gold</option>
                                    <option value="DEO (20W-50-CF 4)">DEO (20W-50-CF 4)</option>
                                    <option value="OEM (20W40-SG) S">OEM (20W40-SG) S</option>
                                    <option value="TRANSMISSION OIL (85W-140)">TRANSMISSION OIL (85W-140)</option>
                                    <option value="NEAT CUT I">NEAT CUT I</option>
                                    <option value="NEAT CUT II">NEAT CUT II</option>
                                    <option value="SMART CUT">SMART CUT</option>
                                    <option value="ANTI RUST OIL VG - 32">ANTI RUST OIL VG - 32</option>
                                    <option value="GEAR OIL EP-320">GEAR OIL EP-320</option>



                                </select>
                            </div>
                            <div class="col-md-1">
                                <p class="fw-bold">Per Litre</p>
                                <input type="text" name="product_litre[]" class="form-control ltr">
                            </div>
                            <div class="col-md-1">
                                <p class="fw-bold">Total Ltr</p>
                                <input type="text" name="total_ltr[]" readonly class="form-control ttl-ltr">
                            </div>
                            <div class="col-md-2">
                                <p class="fw-bold">Single Unit Price</p>
                                <input type="text" name="product_single_price[]" class="form-control unit-price"
                                    min="0" value="0">
                            </div>
                            <div class="col-md-2">
                                <p class="fw-bold">Total Price</p>
                                <input type="text" name="product_total_price[]" class="form-control total-price"
                                    readonly value="0">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-secondary" id="add-item">Add Another Product</button>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <p class="fw-bold">Total</p>
                            <input type="text" readonly id="sum-product-single-price"
                                name="sum_product_single_price" class="form-control" readonly value="0">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Complete Total</p>
                            <input type="text" readonly id="sum-of-total-price" name="sum_of_total_price"
                                class="form-control" readonly value="0">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Action</p>
                            <button type="button" class="btn btn-warning btn-sm" id="clear-form">Clear</button>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <button class="btn btn-success px-5 py-2 fw-bold">PRINT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const itemsContainer = document.getElementById('items-container');
            const addItemButton = document.getElementById('add-item');
            const clearFormButton = document.getElementById('clear-form');
            const sumProductSinglePrice = document.getElementById('sum-product-single-price');
            const sumOfTotalPrice = document.getElementById('sum-of-total-price');

            const calculateTotals = () => {
                let totalUnitPrice = 0;
                let grandTotal = 0;

                document.querySelectorAll('.item-row').forEach(row => {
                    const qty = parseFloat(row.querySelector('.qty').value) || 0;
                    const perLitre = parseFloat(row.querySelector('.ltr').value) || 0;
                    const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
                    const totalLtrField = row.querySelector('.ttl-ltr');
                    const totalPriceField = row.querySelector('.total-price');

                    const totalLitres = qty * perLitre;
                    const totalPrice = totalLitres * unitPrice;

                    totalLtrField.value = totalLitres.toFixed(2);
                    totalPriceField.value = totalPrice.toFixed(2);

                    totalUnitPrice += unitPrice;
                    grandTotal += totalPrice;
                });

                sumProductSinglePrice.value = totalUnitPrice.toFixed(2);
                sumOfTotalPrice.value = grandTotal.toFixed(2);
            };

            addItemButton.addEventListener('click', () => {
                const itemRow = document.createElement('div');
                itemRow.classList.add('row', 'item-row', 'mb-3');
                itemRow.innerHTML = document.querySelector('.item-row').innerHTML;
                itemsContainer.appendChild(itemRow);
            });

            itemsContainer.addEventListener('input', (event) => {
                if (['qty', 'ltr', 'unit-price'].some(cls => event.target.classList.contains(cls))) {
                    calculateTotals();
                }
            });

            itemsContainer.addEventListener('click', (event) => {
                if (event.target.classList.contains('remove-item')) {
                    const itemRows = document.querySelectorAll('.item-row');
                    if (itemRows.length > 1) { // Only remove if there's more than one row
                        event.target.closest('.item-row').remove();
                        calculateTotals();
                    } else {
                        alert("At least one row is required.");
                    }
                }
            });

            clearFormButton.addEventListener('click', () => {
                document.getElementById('invoice-form').reset();
                itemsContainer.innerHTML = document.querySelector('.item-row').outerHTML;
                calculateTotals();
            });

            calculateTotals();
        });
    </script>
</body>

</html>
