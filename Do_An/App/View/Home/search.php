<?php require("header.php") ?>
<?php require("navbar.php") ?>

<?php
$show_product = new productModel;
$html_show_product = $show_product->show_product($data['list_product']);
?>

<section id="main">

    <div>
        <form class="mb-3 input-group" action="index.php?action=search" method="post" enctype="multipart/form-data"
            style="width: 50%; transform: translateX(50%);">
            <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success me-2" name="btn_search" type="submit">
                <i class="ti-search"></i>
            </button>
        </form>

        <section id="product">

            <div class="pro-container">
                <?= $html_show_product; ?>
            </div>
        </section>
    </div>
</section>