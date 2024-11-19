<?php require("header_user.php") ?>
<?php require("navbar_user.php") ?>

<?php
$product = $data['product'];
$customer = $data['customer'];
?>

<section id="container">
    <form class="mb-3" action="index.php?action=buy_cart_u" method="post" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Name</label>
            <input type="text" class="form-control" name="customer_name" value="<?= $customer['customer_name'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Email</label>
            <input type="text" class="form-control" name="customer_email" value="<?= $customer['customer_email'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Numberphone:</label>
            <input type="text" class="form-control" name="customer_phone" value="<?= $customer['customer_phone'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Address:</label>
            <input type="text" class="form-control" name="customer_address" value="<?= $customer['customer_adress'] ?>">
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
            <label style="width: 20%;" class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="<?= $data['quantity'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Total bill</label>
            <input type="text" class="form-control" name="total" value="<?= $data['total'] ?>">.000 VNĐ
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Payment method</label>
            <select name="payment" class="form-control">
                <option>Thanh toán khi nhận hàng</option>
                <option>Thanh toán bằng chuyển khoản</option>
            </select>
        </div>

        <div class="input-group">
            <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <input type="hidden" name="product_img" value="<?= $product['product_img'] ?>">
            <input type="submit" class="btn btn-success" name="thanhtoan" value="Xác nhận mua">
            <a href="index.php?action=show_cart_u" class="btn btn-danger">Hủy</a>
        </div>

    </form>
</section>