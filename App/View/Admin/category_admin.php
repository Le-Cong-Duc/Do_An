<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$list_category =  $data['list_category'];
?>
<section id="container_a">

    <div class="section_middle">
        <table class="table table-primary table-gradient-blue mb-4">
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Product Img</th>
                <th colspan="2"></th>
            </tr>

            <?php foreach ($list_category as $category) : ?>
                <tr>
                    <td><?= $category['category_id'] ?></td>
                    <td><?= $category['category_name'] ?></td>
                    <td><img src="<?= $category['category_img'] ?>"> </td>
                    <td> <a href="index.php?action=update_category&category_id= <?= $category['category_id'] ?> " class="btn btn-warning btn-gradient-yellow">Sửa</a> </td>
                    <td> <a href="index.php?action=delete_category&category_id= <?= $category['category_id'] ?> " class="btn btn-danger btn-gradient-red">Xóa</a> </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <form class="mb-3" action="index.php?action=insert_category" method="post" enctype="multipart/form-data">

            <div class="input-group mb-3">
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