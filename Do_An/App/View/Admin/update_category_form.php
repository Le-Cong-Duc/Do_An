<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<section id="container">
    <h1 class="text-success">Update Category</h1>

    <form class="mb-3" action="index.php?action=update_category" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" value="<?= $data['category_name'] ?>">
        </div>
        <div class="mb-3">
            <img src="<?= $data['category_img'] ?>" alt="" name="img" style="width: 300px;">
        </div>
        <div class="mb-3">
            <label class="form-label">Category Img</label>
            <input type="file" class="form-control" name="image">
        </div>

        <input type="hidden" name="category_id" value="<?= $data['category_id'] ?>">
        <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
        <input type="submit" class="btn btn-danger" value="Hủy">
    </form>

</section>