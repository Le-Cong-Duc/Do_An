<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$list_category = $data['list_category'];
$list_product = $data['list_product'];

$category_id = $data['category']['category_id'];
// $product_name = $data['product']['product_name'];

$total_list_product = 0;
$i = 1;
$status = '';
?>

<section id="container_a">

    <div class="section_middle">

        <?php foreach ($list_product as $pro) {
            $total_list_product += 1;
        } ?>

        <label class="fw-semibold"><?= $total_list_product ?> sản phẩm</label>

        <hr>
        <div class="list_cate">
            <?php foreach ($list_category as $category) : ?>
                <a href="index.php?action=product_a&category_id=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a>
            <?php endforeach; ?>
        </div>

        <hr>

        <form action="index.php?action=search_a" method="post" class="mb-4 pt-3 d-flex gap-3 search">
            <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success" name="btn_search" type="submit">
                <i class="ti-search"></i>
            </button>
        </form>

        <table class="table table-primary table-gradient-blue">
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Product Img</th>
                <th>Product Price</th>
                <th>Status</th>
                <th colspan="2"></th>
            </tr>

            <?php foreach ($list_product as $pro) :
                $total_list_product += 1;
                if ($pro['status'] == 1) {
                    $status = 'Còn';
                } else {
                    $status = 'Hết hàng';
                }
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $pro['product_name'] ?></td>
                    <td> <img src="<?= $pro['product_img'] ?>"></td>
                    <td><?= $pro['price'] ?>.000 VNĐ</td>
                    <td><?= $status ?> </td>
                    <td> <a href="index.php?action=update_product&product_id= <?= $pro['product_id'] ?> " class="btn btn-warning btn-gradient-yellow">Sửa</a> </td>
                    <td> <a href="index.php?action=delete_product&product_id= <?= $pro['product_id'] ?> " class="btn btn-danger btn-gradient-red">Xóa</a> </td>
                </tr>

            <?php $i++;
            endforeach; ?>

        </table>

        <form class="my-4" action="index.php?action=insert_product&category_id=<?= $category_id ?>" method="post"
            enctype="multipart/form-data">
            <h4 class="text-primary mb-3" style="text-align: left; margin-left: 20px;">Thêm sản phẩm</h4>
            <div class="flex gap-3 mb-4 input-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
                <input type="text" class="form-control" name="price" placeholder="Price">
                <input type="text" class="form-control" name="status" placeholder="Status">
            </div>
            <div class="pb-5 input-group">
                <input type="file" class="form-control" name="image" placeholder="Image">
                <input type="submit" class="btn btn-success btn-gradient-green" name="insert" value="Thêm Sản phẩm">
            </div>
        </form>

    </div>
</section>
