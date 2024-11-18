<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$product = new productModel;

$html_category = $category->show_nav_category_a($data['list_category']);
$html_product = $product->show_product_a($data['list_product_name']);

?>

<section id="main">

    <div class="section_left">
        <nav class="navbar">
            <ul>
                <li> <a href="index.php?action=category_a">Quản Lí Danh Mục</a></li>
                <li> <a href="index.php?action=product_a">Quản Lí Sản Phẩm</a></li>
            </ul>
        </nav>
    </div>
    <div class="section_middle">
        <nav class="navbar">
            <ul>
                <li>Loại sản phẩm</li>
                <?= $html_category; ?>
            </ul>
        </nav>
    </div>

    <div class="section_right">

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
                <?= $html_product; ?>
            </tr>
        </table>

    </div>
</section>