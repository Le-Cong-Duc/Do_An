<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$cart = new cartModel;

$list_bill = $data['list_bill'];
?>

<section id="container_a">

    <div class="section_middle">
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
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Payment method</th>
                <th colspan="2"></th>
            </tr>

            <!-- list bill  -->
            <?php foreach ($list_bill as $bill) : ?>
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
                        <a href="index.php?action=delete_bill&bill_id= <?= $bill['bill_id'] ?> "
                            class="btn btn-danger">Xóa
                        </a>
                    </td>
                    <td>
                        <a href="index.php?action=update_bill&bill_id= <?= $bill['bill_id'] ?>"
                            class="btn btn-success">Duyệt
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

    </div>
</section>

<script src="Public/js/view.js"></script>