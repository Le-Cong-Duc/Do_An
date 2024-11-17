<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$html_show_category = $category->show_category_a($data['list_category']);
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

        <table class="table">
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Product Img</th>
                <th colspan="2"></th>
            </tr>
            <?= $html_show_category ?>
        </table>
        <form class="mb-3" action="index.php?action=insert_category" method="post" enctype="multipart/form-data">

            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Category Name" required>
            </div>
            <div class="input-group">
                <input type="file" class="form-control" name="image" placeholder="Category Image">
                <input type="submit" class="btn btn-success" name="insert" value="Thêm danh mục">
            </div>

        </form>
    </div>

    </div>
</section>