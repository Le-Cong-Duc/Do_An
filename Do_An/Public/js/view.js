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


function approveOrder(billId) {
    if (confirm("Bạn có chắc chắn muốn duyệt đơn hàng này?")) {
        $.ajax({
            url: 'index.php?action=update_bill', // URL xử lý yêu cầu
            method: 'POST', // Phương thức gửi yêu cầu
            data: { bill_id: billId }, // Dữ liệu gửi đi
            success: function(response) {
                alert("Đơn hàng đã được duyệt thành công!");
                // Cập nhật trạng thái của đơn hàng mà không tải lại trang
                document.querySelector(`#status_${billId}`).innerText = "Đã Duyệt";
            },
            error: function() {
                alert("Có lỗi xảy ra khi duyệt đơn hàng!");
            }
        });
    }
}

