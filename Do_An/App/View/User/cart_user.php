<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$model = new cartModel;
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
            <th>Xóa</th>
            <th>Mua</th>
        </tr>
        <?= $html_cart; ?>

    </table>
    <div id="main">
        <div style="width: 40%;">
            <a href="index?action=delete_all_cart_u" class="btn btn-danger">Xóa giỏ hàng</a>
            <a href="index?action=user" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    </div>
</section>