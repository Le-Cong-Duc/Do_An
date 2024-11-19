function updateHiddenQuantity() {
    const quantity = document.getElementById('quantity').value;
    document.getElementById('hidden_quantity').value = quantity;
}

function changeQuantity(change) {
    const quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    currentValue += change;
    if (currentValue < 1) currentValue = 1;
    quantityInput.value = currentValue;

    updateHiddenQuantity();
}
document.getElementById('quantity').addEventListener('input', updateHiddenQuantity);

