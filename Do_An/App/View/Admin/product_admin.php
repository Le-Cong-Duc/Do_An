<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$product = new productModel;

$html_category = $category->show_nav_category_a($data['list_category']);
$product = $product->show_product_a($data['list_product']);
$html_product = $product['html_list_product'];
$total_product = $product['total_product'];
$category_id = $data['category']['category_id'];
$product_name = $data['product']['product_name'];
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

    <div class="section_right">

        <label><?= $total_product ?> sản phẩm</label>
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

        <table class="table table-primary">
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
        <form class="mb-3" action="index.php?action=insert_product&category_id=<?= $category_id ?>" method="post"
            enctype="multipart/form-data">
            <h4 class="text-primary" style="text-align: left; margin-left: 20px;">Thêm sản phẩm</h4>
            <div class="mb-3 input-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
                <input type="text" class="form-control" name="price" placeholder="Price">
                <input type="text" class="form-control" name="status" placeholder="Status">
            </div>
            <div class="mb-3 input-group">
                <input type="file" class="form-control" name="image" placeholder="Image">
                <input type="submit" class="btn btn-success" name="insert" value="Thêm Sản phẩm">
            </div>
        </form>
    </div>
</section>