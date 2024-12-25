<?php include('header_s.php') ?>
<?php include('navbar_s.php') ?>

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

        <table class="table table-gradient-yellow">
            <tr>
                <th>Customer Name</th>
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
                }

                if ($order['status'] == 2) {
                    $order['status'] = 'Đang chờ giao hàng';
                } else if ($order['status'] == 3) {
                    $order['status'] = '<div style = "color: green"> Đã giao thành công </div>';
                }
                ?>

                <tr>
                    <td><?= $order['customer_name'] ?></td>
                    <td><?= $order['product_name'] ?></td>
                    <td> <img src="<?= $order['product_img'] ?>" width=200px> </td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['total_bill'] ?></td>
                    <td style="color: blue; font-weight: bolder;"><?= $order['status'] ?></td>
                    <td><?= $order['payment_method'] ?></td>
                    <td>
                        <form action="index.php?action=check_ship" method="post">
                            <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                            <input class="btn btn-warning btn-gradient-green" type="submit" value="Đã giao hàng">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</section>
