<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$product = new productModel;

$html_category = $category->show_nav_category_a($data['list_category']);
$html_product = $product->show_product_a($data['list_product']);
$category_id = $data['category']['category_id'];
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