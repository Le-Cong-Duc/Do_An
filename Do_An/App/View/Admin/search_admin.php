<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$product = new productModel;

$html_category = $category->show_nav_category_a($data['list_category']);
$html_product = $product->show_product_a($data['list_product_name']);

?>

<section id="container_a">

    <div class="section_middle">

        <hr>
        <div class="list_cate">
            <?= $html_category; ?>
        </div>
        <hr>
        
        <form action="index.php?action=search_a" method="post" class="mb-3 d-flex search">
            <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success me-2" name="btn_search" type="submit">
                <i class="ti-search"></i>
            </button>
        </form>

        <table class="table">
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Product Img</th>
                <th>Product Price</th>
                <th>Status</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <?= $html_product['html_list_product'] ?>
            </tr>
        </table>

    </div>
</section>