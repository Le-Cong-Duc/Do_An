<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php

$list_order = $data['list_order'];
?>

<section id="container">
    <form action="index.php?action=search_bill" method="post" class="mb-3 d-flex search">
        <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success me-2" name="btn_search" type="submit">
            <i class="ti-search"></i>
        </button>
    </form>

    <table class="table table-gradient-yellow">
        <tr>
            <th>Customer Name</th>
            <!-- <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th> -->
            <th>Product Name</th>
            <th>Product Img</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment method</th>
            <th colspan="2"></th>
        </tr>
        <?php foreach ($list_order as $order) : ?>
            <?php if ($order['payment_method'] == 1) {
                $order['payment_method'] = 'Thanh toán khi nhận hàng';
            } else {
                $order['payment_method'] = 'Thanh toán bằng chuyển khoản';
            } ?>

            <tr>
                <td><?= $order['customer_name'] ?></td>
                <!-- <td><?= $order['customer_email'] ?></td>
                <td><?= $order['customer_phone'] ?></td>
                <td><?= $order['customer_address'] ?></td> -->
                <td><?= $order['product_name'] ?></td>
                <td> <img src="<?= $order['product_img'] ?>" width=200px> </td>
                <td><?= $order['quantity'] ?></td>
                <td><?= $order['total_bill'] ?></td>
                <td><?= $order['status'] ?></td>
                <td><?= $order['payment_method'] ?></td>

                <td>
                    <a href="index.php?action=delete_order&order_id= <?= $bill['order_id'] ?> "
                        class="btn btn-danger btn-gradient-red">Xóa
                    </a>
                </td>
                <td>
                    <form id="order_to_bill">
                        <input type="hidden" class="order_id" value="<?= $order['order_id'] ?>">
                        <input type="hidden" id="customer_id" value="<?= $order['customer_id'] ?>">
                        <input type="hidden" id="product_id" value="<?= $order['product_id'] ?>">
                        <input type="hidden" id="product_name" value="<?= $order['product_name'] ?>">
                        <input type="hidden" id="product_img" value="<?= $order['product_img'] ?>">
                        <input type="hidden" id="customer_name" value="<?= $order['customer_name'] ?>">
                        <input type="hidden" id="customer_address" value="<?= $order['customer_address'] ?>">
                        <input type="hidden" id="customer_email" value="<?= $order['customer_email'] ?>">
                        <input type="hidden" id="customer_phone" value="<?= $order['customer_phone'] ?>">
                        <input type="hidden" id="quantity" value="<?= $order['quantity'] ?>">
                        <input type="hidden" id="total_bill" value="<?= $order['total_bill'] ?>">

                        <input class="btn btn-success btn-gradient-green" type="submit" value="Duyệt">

                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</section>

<script>
    $(document).ready(function() {
        $('#order_to_bill').on('submit', function(e) {

            var order_id = $('.order_id').val();

            var customer_id = $('#customer_id').val();
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').val();
            var product_img = $('#product_img').val();
            var customer_name = $('#customer_name').val();
            var customer_address = $('#customer_address').val();
            var customer_email = $('#customer_email').val();
            var customer_phone = $('#customer_phone').val();
            var quantity = $('#quantity').val();
            var total_bill = $('#total_bill').val();
            e.preventDefault;

            $.ajax({
                method: 'post',
                url: "index.php?action=order_to_bill",
                data: {
                    order_id: order_id,
                    customer_id: customer_id,
                    product_id: product_id,
                    product_name: product_name,
                    product_img: product_img,
                    customer_address: customer_address,
                    customer_name: customer_name,
                    customer_email: customer_email,
                    customer_phone: customer_phone,
                    quantity: quantity,
                    total_bill: total_bill
                },
                success: function(response) {
                    alert("Đã duyệt!");
                    window.location.reload();
                }
            });
        });
    });
</script>