<?php include('header.php') ?>
<?php include('navbar.php') ?>

<?php
$show_product = new productModel;
$show_category = new catgoryModel;

$html_list_product = $show_product->show_product($data['list_product']);
$category = $data['list_category_id'];
?>


<section class="banner">
    <img src="<?= $category['category_banner'] ?>" alt="" width="100%">
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
    <img src="<?= $category['category_banner'] ?>" alt="" width="100%">
</section>


<?php include('footer.php') ?>
