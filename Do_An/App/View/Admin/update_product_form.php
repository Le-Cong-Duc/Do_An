<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
    if($data['status'] = 1){
        $data['status'] = 'còn';
    }
    else{
        $data['status'] = 'hết hàng';
    }
?>

<section id="container">
    <form class="mb-3" action="index.php?action=update_product" method="post" enctype="multipart/form-data">

        <h1 class="text-success">Update form    </h1>
        <div class="mb-3 input-group">
            <label style="margin-right: 20px;" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" value="<?= $data['product_name'] ?>">
        </div>
        <img src="<?= $data['product_img'] ?>" alt="image" style="width: 300px;">
        <div class="mb-3 input-group">
            <label style="margin-right: 30px;" class="form-label">Category Img:</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="mb-3 input-group">
            <label style="margin-right: 20px;" class="form-label">Category Price:</label>
            <input type="text" class="form-control" name="price" value="<?= $data['price']?>">.000 VNĐ
        </div>

        <div class="mb-3 input-group">
            <label style="margin-right: 15px;" class="form-label">Category Status</label>
            <input type="text" class="form-control" name="status" value="<?= $data['status'] ?>">
        </div>

        <input type="hidden" name="product_id" value="<?= $data['product_id'] ?>">
        <input type="submit" class="btn btn-success" value="Thêm sản phẩm" name="update">
    </form>
</section>