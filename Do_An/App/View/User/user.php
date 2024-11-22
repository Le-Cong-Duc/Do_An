<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$model = new cartModel_U;
$html_bill = $model->show_bill_u($data['list_bill']);
$customer = $data['list_customer'];
?>

<section id="cart">
    <div id="main">
        <div class="section_left">

            <form class="mb-3 form-control" action="index.php?action=update_user_u" method="post"
                enctype="multipart/form-data">

                <div class="mb-3 input-group">

                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="customer_name"
                        value="<?= $customer['customer_name'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Numberphone</label>
                    <input type="text" class="form-control" name="customer_phone"
                        value="<?= $customer['customer_phone'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="customer_address"
                        value="<?= $customer['customer_adress'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $customer['username'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $customer['password'] ?>">
                </div>

                <div class="input-group">
                    <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
                    <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
                </div>
            </form>
        </div>

        <div class="section_right">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>

                <?= $html_bill; ?>

            </table>
            <a href="index?action=user" class="btn btn-primary">Tiếp tục mua sắm</a>
            <a href="index?action=show_cart_u" class="btn btn-warning">Giỏ hàng</a>
        </div>
    </div>
</section>