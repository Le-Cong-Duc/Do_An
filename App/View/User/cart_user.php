<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$total_bill = 0;
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

        <?php if (count($_SESSION['cart']) > 0) {

            foreach ($_SESSION['cart'] as $cart) {
                $total = $cart['price'] * $cart['quantity'];
                $total_bill += $total;
        ?>

                <tr>
                    <td>
                        <img src="<?= $cart['img'] ?>">
                    </td>
                    <td>
                        <h4><?= $cart['name'] ?></h4>
                    </td>
                    <td>
                        <h4><?= $cart['price'] ?>.000 VND</h4>
                    </td>
                    <td>
                        <h4><?= $cart['quantity'] ?></h4>
                    </td>
                    <td>
                        <h4> <?= $total ?>.000 VNĐ </h4>
                    </td>
                    <td>
                        <a href="index.php?action=delete_cart_u&product_id=<?= $cart['id'] ?>" class="btn btn-danger" type="submit"> Xóa </a>
                    </td>
                    <td>
                        <form action="index.php?action=check_cart_u" method="post">
                            <input type="hidden" name="product_id" value="<?= $cart['id'] ?>">
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <button class="btn btn-success" type="submit" name="buy"> Mua </button>
                        </form>

                    </td>
                </tr>
        <?php }
        } ?>

    </table>
    <div id="main">
        <div style="width: 40%;">
            <a href="index?action=delete_all_cart_u" class="btn btn-danger">Xóa giỏ hàng</a>
            <a href="index?action=user" class="btn btn-primary">Tiếp tục mua sắm</a>
            <a href="index?action=buy_all_cart_u" class="btn btn-success">Mua tất cả</a>

            <div class="totaltotal" style="color: blue; font-weight: bolder;">Tổng tiền: <?= number_format($total_bill) ?>.000 VNĐ</div>
        </div>
    </div>
</section>