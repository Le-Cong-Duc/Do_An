<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$model = new cartModel;
$html_bill = $model->show_bill_u($data['list_bill']);
$customer = $data['list_customer'];
?>

<section id="cart">
    <div id="main">
        <div class="section_left">

            <form class="mb-3 form-control" id="form_update">

                <div class="mb-3 input-group">

                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="customer_name"
                        value="<?= $customer['customer_name'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="customer_email"
                        value="<?= $customer['customer_email'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Numberphone</label>
                    <input type="text" class="form-control" id="phone" name="customer_phone"
                        value="<?= $customer['customer_phone'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="customer_address"
                        value="<?= $customer['customer_adress'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?= $customer['username'] ?>">
                </div>

                <div class="mb-3 input-group">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password"
                        value="<?= $customer['password'] ?>">
                </div>

                <div class="input-group">
                    <input type="hidden" name="customer_id" id="id" value="<?= $customer['customer_id'] ?>">
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

<script>
    $(document).ready(function () {

        $('#form_update').on('submit', function (e) {
            var customer_id = $('#id').val();
            var customer_name = $('#name').val();
            var customer_phone = $('#phone').val();
            var customer_address = $('#address').val();
            var customer_email = $('#email').val();
            var username = $('#username').val();
            var password = $('#password').val();

            e.preventDefault();
            $.ajax({
                method: 'post',
                url: "index.php?action=update_user_u",
                data: {
                    customer_id: customer_id,
                    customer_name: customer_name,
                    customer_phone: customer_phone,
                    customer_address: customer_address,
                    customer_email: customer_email,
                    username: username,
                    password: password
                },
                success: function (response) {
                    // console.log(response);
                    alert("Cập nhật thông tin thành công!");
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Có lỗi xảy ra. Vui lòng thử lại.");
                }
            });
        });
    });
</script>