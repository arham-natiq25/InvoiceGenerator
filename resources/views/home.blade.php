<form action="" method="POST">
    @csrf
    <input type="text" name="invoice_no" placeholder="Invoice No" required>
    <input type="text" name="buyer_name" placeholder="Buyer Name" required>
    <textarea name="buyer_address" placeholder="Buyer Address" required></textarea>
    <input type="text" name="phone_no" placeholder="Phone No" required>
    <input type="date" name="date" required>

    <div id="items">
        <div class="item">
            <input type="text" name="items[0][product_name]" placeholder="Product Name" required>
            <input type="number" name="items[0][quantity]" placeholder="Quantity" required>
            <input type="number" name="items[0][unit_price]" placeholder="Unit Price" required>
        </div>
    </div>
    <button type="button" id="add-item">Add Item</button>
    <button type="submit">Generate Invoice</button>
</form>

<script>
    let itemCount = 1;
    document.getElementById('add-item').addEventListener('click', () => {
        const itemsDiv = document.getElementById('items');
        const newItem = `
            <div class="item">
                <input type="text" name="items[${itemCount}][product_name]" placeholder="Product Name" required>
                <input type="number" name="items[${itemCount}][quantity]" placeholder="Quantity" required>
                <input type="number" name="items[${itemCount}][unit_price]" placeholder="Unit Price" required>
            </div>`;
        itemsDiv.insertAdjacentHTML('beforeend', newItem);
        itemCount++;
    });
</script>
