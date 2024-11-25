<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$html_show_category = $category->show_category_a($data['list_category']);
?>
<section id="container_a">

    <div class="section_middle">
        <table class="table table-primary">
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