<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$detail_product = $data['detail_product'];

$show_product = new productModel;

$html_show_product = $show_product->show_product_u($data['more_product']);
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
                <?= $detail_product['description'] ?>
            </div>

            <div class="quantity">
                <button onclick="changeQuantity(-1)">-</button>
                <input type="number" name="product_quantity" id="quantity" value="1" min="1">
                <button onclick="changeQuantity(1)">+</button>
            </div>

            <p class="price">
                <?= $detail_product['price'] . '.000 VNĐ' ?>
            </p>

            <form action="index.php?action=add_cart_u" method="post">
                <input type="hidden" name="product_id" value="<?= $detail_product['product_id'] ?>">
                <input type="hidden" name="product_name" value="<?= $detail_product['product_name'] ?>">
                <input type="hidden" name="product_img" value="<?= $detail_product['product_img'] ?>">
                <input type="hidden" name="product_price" value="<?= $detail_product['price'] ?>">
                <input type="hidden" name="hidden_quantity" id="hidden_quantity" value="1">
                <button class="btn btn-warning text-light" type="submit" name="add_cart">
                    Thêm vào giỏ hàng
                </button>
            </form>
        </div>
    </div>

    <section id="product">
        <h3 class="more_option"> SẢN PHẨM CÓ LIÊN QUAN </h3>
        <div class="pro-container">
            <?= $html_show_product ?>
        </div>
        <button id="load-more">Xem thêm</button>
    </section>

</div>

<?php include('footer_user.php') ?>


<script src="Public/js/view.js"></script>
</body>

</html>