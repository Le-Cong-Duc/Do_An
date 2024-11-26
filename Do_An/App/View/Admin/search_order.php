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

    <table class="table">
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Product Name</th>
            <th>Product Img</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment method</th>
            <th colspan="2"></th>
        </tr>
        <?php foreach ($list_order as $bill) : ?>
            <?php if ($bill['payment_method'] == 1) {
                $bill['payment_method'] = 'Thanh toán khi nhận hàng';
            } else {
                $bill['payment_method'] = 'Thanh toán bằng chuyển khoản';
            } ?>

            <tr>
                <td><?= $bill['customer_name'] ?></td>
                <td><?= $bill['customer_email'] ?></td>
                <td><?= $bill['customer_phone'] ?></td>
                <td><?= $bill['customer_address'] ?></td>
                <td><?= $bill['product_name'] ?></td>
                <td> <img src="<?= $bill['product_img'] ?>" width=200px> </td>
                <td><?= $bill['quantity'] ?></td>
                <td><?= $bill['total_bill'] ?></td>
                <td><?= $bill['status'] ?></td>
                <td><?= $bill['payment_method'] ?></td>

                <td>
                    <a href="index.php?action=delete_order&order_id= <?= $bill['order_id'] ?> "
                        class="btn btn-danger">Xóa
                    </a>
                </td>
                <td>
                    <a href="index.php?action=order_to_bill&order_id= <?= $bill['order_id'] ?>"
                        class="btn btn-success">Duyệt
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</section>