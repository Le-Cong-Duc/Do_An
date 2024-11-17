<?php include('header_user.php') ?>
<?php include('navbar_user.php') ?>

<?php
$show_product = new productModel;
$show_category = new catgoryModel;

$html_list_product = $show_product->show_product_u($data['list_product']);
$html_banner = $data['list_category_id'];

?>

<section class="banner">
    <img src="<?= $html_banner['category_banner'] ?>" alt="" width="100%">
</section>

<section id="product">
    <div id="introduce">
        <h2>ĐẶC SẢN <div class="title"> ĐÀ NẴNG</div>
        </h2>
    </div>

    <div class="pro-container">
        <?= $html_list_product ?>

    </div>


</section>

<section id="banner">
    <img src="<?= $html_banner['category_banner'] ?>" alt="" width="100%">
</section>


<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext"></div>
</section>

<?php include('footer_user.php') ?>