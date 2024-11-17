<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$html_cart = '';
$total_bill = 0;
if (count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $cart) {
        $total = $cart['price'] * $cart['quantity'];
        $total_bill += $total;
        $html_cart .=
            '<tr>
                <td>
                    <img src="' . $cart['img'] . '">
                </td>
                <td>
                    <h4>' . $cart['name'] . '</h4>
                </td>
                <td>
                    <h4>' . $cart['price'] . '.000 VND</h4>
                </td>
                <td>
                    <h4>' . $cart['quantity'] . '</h4>
                </td>
                <td>
                    <h4> ' . $total . '.000 VNĐ </h4>
                </td>
                <td>
                    <input type="checkbox">
                </td>
                <td>
                    <a href="index.php?action=delete_cart&product_id='.$cart['id'].'" class="btn btn-danger" type="submit" > Xóa </a>
                 </td>
            </tr>';
    }
}
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
            <a href="index?action=delete_all_cart" class="btn btn-danger">Xóa giỏ hàng</a>
        </div>
        <div class="section_right">
                <label>Tổng tiền</label>
                <span style="font-weight: 600;"><?=$total_bill?>.000 VNĐ"</span> 
        </div>
    </div>
</section>