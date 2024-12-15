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
        /* For modern browsers */
        input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
            -webkit-appearance: none;
            /* Safari and Chrome */
            appearance: none;
            /* Standard */
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center mt-3">
        <div class="card " style="width: 80%; border: 5px solid black">
            <div class="text-center">
                <img src="/logo.png" width="80px" class="img-fluid" alt="">
                <div class="fw-bolder">
                    NEW HASHIR OIL TRADERS
                </div>
                <div class="fw-bold">
                    Qaim Sain Darbar Road,Street No 11 Faizabad , Faisalabad .
                </div>
            </div>
            <div class="card-body">
                <form id="invoice-form" method="POST" action="{{ route('generate-invoice') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <p class="fw-bold">Invoice No :</p>
                            <input type="text" name="invoice_no" style="border-bottom: 2px solid black"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold">Date</p>
                            <input type="date" name="date" style="border-bottom: 2px solid black"
                                class="form-control">
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold">Buyer's Name</p>
                            <input type="text" name="buyer_name" style="border-bottom: 2px solid black"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold">Buyer's Phone</p>
                            <input type="text" name="buyer_phone" style="border-bottom: 2px solid black"
                                class="form-control">
                        </div>
                        <div class="col-md-12 mt-2">
                            <p class="fw-bold">Buyer's Address</p>
                            <textarea name="buyer_address" style="border-bottom: 2px solid black" class="form-control"></textarea>
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
                            <div class="col-md-4">
                                <p class="fw-bold">Product Name</p>
                                <input type="text" name="product_name[]" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <p class="fw-bold">Litre</p>
                                <input type="text" name="product_litre[]" class="form-control ltr">
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
                            <input type="text" id="sum-product-single-price" name="sum_product_single_price"
                                class="form-control" readonly value="0">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Complete Total</p>
                            <input type="text" id="sum-of-total-price" name="sum_of_total_price"
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

            // Function to calculate totals
            const calculateTotals = () => {
                let totalUnitPrice = 0;
                let totalPrice = 0;

                document.querySelectorAll('.item-row').forEach(row => {
                    const qty = parseFloat(row.querySelector('.qty').value) || 0;
                    const totalltr = parseFloat(row.querySelector('.ltr').value) || 0;
                    const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
                    const totalPriceField = row.querySelector('.total-price');

                    const rowTotal = (qty * totalltr) * unitPrice;
                    totalPriceField.value = rowTotal.toFixed(2);

                    totalUnitPrice += unitPrice;
                    totalPrice += rowTotal;
                });

                sumProductSinglePrice.value = totalUnitPrice.toFixed(2);
                sumOfTotalPrice.value = totalPrice.toFixed(2);
            };

            // Add item row
            addItemButton.addEventListener('click', () => {
                const itemRow = document.createElement('div');
                itemRow.classList.add('row', 'item-row', 'mb-3');
                itemRow.innerHTML = `
                        <div class="col-md-1">
                            <p class="fw-bold">Qty</p>
                            <input type="text" name="qty[]" class="form-control qty" min="1" value="1">
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold">Product Name</p>
                            <input type="text" name="product_name[]" class="form-control">
                        </div>
                      <div class="col-md-1">
                        <p class="fw-bold">Litre</p>
                        <input type="text" name="product_litre[]" class="form-control ltr">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Single Unit Price</p>
                            <input type="text" name="product_single_price[]" class="form-control unit-price" min="0" value="0">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Total Price</p>
                            <input type="text" name="product_total_price[]" class="form-control total-price" readonly value="0">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                        </div>
                    `;
                itemsContainer.appendChild(itemRow);
            });

            // Remove item row
            itemsContainer.addEventListener('click', (event) => {
                if (event.target.classList.contains('remove-item')) {
                    event.target.closest('.item-row').remove();
                    calculateTotals();
                }
            });

            // Recalculate on input changes
            itemsContainer.addEventListener('input', (event) => {
                if (event.target.classList.contains('qty') || event.target.classList.contains(
                    'unit-price')) {
                    calculateTotals();
                }
            });

            // Clear form
            clearFormButton.addEventListener('click', () => {
                document.getElementById('invoice-form').reset();
                itemsContainer.innerHTML = '';
                calculateTotals();
            });

            // Initial calculation
            calculateTotals();
        });
    </script>
</body>

</html>
