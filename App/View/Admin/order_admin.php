<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$list_order = $data['list_order'];
?>

<section id="container_a">

    <div class="section_middle">
        <form action="index.php?action=search_order" method="post" class="mb-3 d-flex search">
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
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Payment method</th>
                <th colspan="2"></th>
            </tr>

            <!-- list bill  -->
            <?php foreach ($list_order as $order) : ?>
                <?php if ($order['payment_method'] == 1) {
                    $order['payment_method'] = 'Thanh toán khi nhận hàng';
                } else {
                    $order['payment_method'] = 'Thanh toán bằng chuyển khoản';
                } ?>

                <tr>
                    <td><?= $order['customer_name'] ?></td>
                    <td><?= $order['customer_email'] ?></td>
                    <td><?= $order['customer_phone'] ?></td>
                    <td><?= $order['customer_address'] ?></td>
                    <td><?= $order['product_name'] ?></td>
                    <td> <img src="<?= $order['product_img'] ?>" width=200px> </td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['total_bill'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><?= $order['payment_method'] ?></td>

                    <td>
                        <a href="index.php?action=delete_order&order_id= <?= $order['order_id'] ?> "
                            class="btn btn-danger">Xóa
                        </a>
                    </td>
                    <td>
                        <form action="index.php?action=order_to_bill" method="post">
                            <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                            <input type="hidden" name="customer_id" value="<?= $order['customer_id'] ?>">
                            <input type="hidden" name="product_id" value="<?= $order['product_id'] ?>">
                            <input type="hidden" name="product_name" value="<?= $order['product_name'] ?>">
                            <input type="hidden" name="product_img" value="<?= $order['product_img'] ?>">
                            <input type="hidden" name="customer_name" value="<?= $order['customer_name'] ?>">
                            <input type="hidden" name="customer_address" value="<?= $order['customer_address'] ?>">
                            <input type="hidden" name="customer_email" value="<?= $order['customer_email'] ?>">
                            <input type="hidden" name="customer_phone" value="<?= $order['customer_phone'] ?>">
                            <input type="hidden" name="quantity" value="<?= $order['quantity'] ?>">
                            <input type="hidden" name="total_bill" value="<?= $order['total_bill'] ?>">

                            <input class="btn btn-success" type="submit" value="Duyệt">
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

    </div>
</section>

<!-- <script src="Public/js/view.js"></script> -->

