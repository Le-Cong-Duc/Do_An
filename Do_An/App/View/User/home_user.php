<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$show_category = new catgoryModel;
$html_list_category = $show_category->show_category_u($data['list_category']);

$show_product = new productModel;

$html_list_product_1 = $show_product->show_product_u($data['list_product_1']);
$html_list_product_2 = $show_product->show_product_u($data['list_product_2']);
$html_list_product_3 = $show_product->show_product_u($data['list_product_3']);
$html_list_product_4 = $show_product->show_product_u($data['list_product_4']);
?>
<div id="container">
    <section id="slider">
        <img src="Public/img/slide.jpg" class="img-fluid" alt="">
    </section>

    <div id="introduce">
        <h2>ĐẶC SẢN <div class="title"> ĐÀ NẴNG</div>
        </h2>

        <p> Kết thúc chuyến đi Đà Nẵng của mình, bạn đang muốn tìm những món quà nho nhỏ về làm quà? Quả là khó để mang
            về nhà những mì Quảng, bún mắm hay bánh xèo, nhưng hãy yên tâm vì thành phố biển xinh đẹp này vẫn còn rất
            nhiều món đặc sản khô Đà Nẵng mang đầy đủ hương vị đặc trưng nơi đây.
        </p>
    </div>
    <section id="category">
        <?= $html_list_category; ?>
    </section>


    <section id="product">

        <h4>Đặc sản bánh kẹo </h4>
        <hr>
        <div class="pro-container">
            <?= $html_list_product_1; ?>

            <a href="index.php?action=product_u&category_id=1" class="pro">
                <img style="opacity: 0.3;" src="Public/img/see_more.jpeg" alt="">
                <a href="#" style="opacity: 0;">
                    <i class="fal ti-shopping-cart cart"></i>
                </a>
            </a>
        </div>


        <h4>Đặc sản khô </h4>
        <hr>
        <div class="pro-container">
            <?= $html_list_product_2; ?>

            <a href="index.php?action=product_u&category_id=2" class="pro">
                <img style="opacity: 0.3;" src="Public/img/see_more.jpeg" alt="">
                <a href="#" style="opacity: 0;">
                    <i class="fal ti-shopping-cart cart"></i>
                </a>
            </a>
        </div>


        <h4>Đặc sản mắm </h4>
        <hr>
        <div class="pro-container">
            <?= $html_list_product_3; ?>

            <a href="index.php?action=product_u&category_id=3" class="pro">
                <img style="opacity: 0.3;" src="Public/img/see_more.jpeg" alt="">
                <a href="#" style="opacity: 0;">
                    <i class="fal ti-shopping-cart cart"></i>
                </a>
            </a>
        </div>


        <h4>Đặc sản một nắng </h4>
        <hr>
        <div class="pro-container">
            <?= $html_list_product_4; ?>

            <a href="index.php?action=product_u&category_id=4" class="pro">
                <img style="opacity: 0.3;" src="Public/img/see_more.jpeg" alt="">
                <a href="#" style="opacity: 0;">
                    <i class="fal ti-shopping-cart cart"></i>
                </a>
            </a>
        </div>

    </section>
</div>

<?php include('footer_user.php') ?>