<?php include('header.php') ?>
<?php include('navbar.php') ?>

<?php
$detail_product = $data['detail_product'];

$show_product = new productModel;

$html_show_product = $show_product->show_product($data['more_product']);
?>

<div id="detail_product">

    <div class="content">

        <img src="<?= $detail_product['product_img'] ?>" alt="Product Image">

        <div class="info">
            <h2 class="name">
                <?= $detail_product['product_name'] ?>
            </h2>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="des">

                <h3> Mô Tả</h3>
                <?= $detail_product['description']?>
            </div>


            <p class="price"><?=$detail_product['price'].'.000 VNĐ'?></p>

        
            <div class="button">
                <button class="btn_card" onclick="location.href='index.php?action=sign_in'">Đăng nhập để mua hàng</button>
            </div>
        </div>
    </div>

    <section id="product">
        <h3 class="more_option"> SẢN PHẨM CÓ LIÊN QUAN </h3>
        <div class="pro-container">
            <?= $html_show_product?>
        </div>
    </section>

</div>


</body>

</html>