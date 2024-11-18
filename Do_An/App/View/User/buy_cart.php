<?php require("header_user.php") ?>
<?php require("navbar_user.php") ?>

<?php
$product = $data['product'];
$customer = $data['customer'];
?>

<section id="container">
    <form class="mb-3" action="index.php?action=buy_cart_u" method="post" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="name" value="<?= $customer['customer_name'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer email</label>
            <input type="text" class="form-control" name="email" value="<?= $customer['customer_email'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer phone:</label>
            <input type="text" class="form-control" name="phone" value="<?= $customer['customer_phone'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer address:</label>
            <input type="text" class="form-control" name="address" value="<?= $customer['customer_adress'] ?>">
        </div>


        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Product name:</label>
            <input type="text" class="form-control" name="product_name" value="<?= $product['product_name'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Product img</label>
            <img src="<?= $product['product_img'] ?>" alt="" style="width: 100px;">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Total bill</label>
            <input type="text" class="form-control" name="total" value="<?= $data['total'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Payment method</label>
            <select name="payment" class="form-control">
                <option>>>--Chọn phương thức thanh toán--<<</option>
                <option>Thanh toán khi nhận hàng</option>
                <option>Thanh toán bằng chuyển khoản</option>
            </select>
        </div>

        <div class="input-group">
            <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
            <input type="submit" class="btn btn-success" name="update" value="Thanh Toán">
            <a href="index.php?action=show_cart_u" class="btn btn-danger">Hủy</a>
        </div>

    </form>
</section>