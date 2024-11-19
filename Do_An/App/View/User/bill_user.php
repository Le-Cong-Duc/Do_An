<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$model = new cartModel_U;
$html_bill = $model->show_bill_u($data['list_bill']);
?>

<section id="cart">
    <h1>
        <?= $titlePage; ?>
    </h1>
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>

        <?= $html_bill; ?>

    </table>
    <div id="main">
        <div class="section_left">
            <a href="index?action=user" class="btn btn-primary">Tiếp tục mua sắm</a>
            <a href="index?action=show_cart_u" class="btn btn-warning">Giỏ hàng</a>
        </div>
    </div>
</section>