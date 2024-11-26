<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$category = new catgoryModel;
$product = new productModel;

$list_category = $data['list_category'];
$list_product = $data['list_product_name'];

?>

<section id="container_a">

    <div class="section_middle">

        <hr>
        <div class="list_cate">
            <?php foreach ($list_category as $category) : ?>
                <a href="index.php?action=product_a&category_id=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a>
            <?php endforeach; ?>
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
                    <td> <a href="index.php?action=update_product&product_id= <?= $pro['product_id'] ?> " class="btn btn-warning">Sửa</a> </td>
                    <td> <a href="index.php?action=delete_product&product_id= <?= $pro['product_id'] ?> " class="btn btn-danger">Xóa</a> </td>
                </tr>

            <?php $i++;
            endforeach; ?>

        </table>

    </div>
</section>