<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$model = new cartModel_U;
$data = $model->show_product();
$html_cart = $data['html_cart'];
$total_bill = $data['total_bill'];
?>

<section id="cart">
    <h1>
        <?= $titlePage; ?>
    </h1>
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Chọn</th>
            <th>Thao tác</th>
        </tr>

        <?= $html_cart; ?>

    </table>
    <div id="main">
        <div class="section_left">
            <a href="index?action=delete_all_cart_u" class="btn btn-danger">Xóa giỏ hàng</a>
            <a href="index?action=user" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
        <!-- <div class="section_right">
            <a href="index?action=user_detail" class="btn btn-primary">Mặt hàng đã mua</a>
            <label>Tổng tiền</label>
            <span style="font-weight: 600;">
                <?= $total_bill ?>.000 VNĐ
            </span>
        </div> -->
    </div>
</section>