<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>

<?php
$list_bill = $data['list_bill'];
$more_bill = $data['more_bill'];

$list_product = $data['list_product'];
$list_customer = $data['list_customer'];

$list_most = $data['most_product'];
$more_product = $data['more_product'];

$i = 0;
$ii = 0;
$product_count = 0;
$customer_count = 0;
$total_bill = 0;
?>

<section id="container_a">
    <div class="section_middle">

        <?php
        foreach ($list_bill as $bill) {
            $total_bill += $bill['total'];
        }
        foreach ($list_product as $product) {
            $product_count++;
        }
        foreach ($list_customer as $customer) {
            $customer_count++;
        }
        ?>

        <div class="container text-center pb-4 border-bottom">
            <div class="row align-items-center">

                <div class="col" id="appear">
                    <div class="btn btn-success btn-gradient-green">Tổng số doanh thu<br> <?= number_format($total_bill) . '.000 VNĐ' ?></div>
                </div>
                <div class="col" id="appear">
                    <a href="index.php?action=product_a" class="btn btn-primary btn-gradient-blue">Sản phẩm hiện có<br> <?= $product_count . ' sản phẩm' ?></a>
                </div>
                <div class="col" id="appear">
                    <a href="index.php?action=customer" class="btn btn-warning btn-gradient-yellow">Tổng số khách hàng<br> <?= $customer_count . ' khách hàng' ?></a>
                </div>

                <div class="col" id="hidden">
                    <div class="btn btn-success">Doanh thu: <br> <?= $total_bill . '.000 VNĐ' ?></div>
                </div>
                <div class="col" id="hidden">
                    <a href="index.php?action=product_a" class="btn btn-primary">Sản phẩm <br> <?= $product_count . ' sản phẩm' ?></a>
                </div>
                <div class="col" id="hidden">
                    <a href="index.php?action=customer" class="btn btn-warning">Khách hàng <br> <?= $customer_count . ' khách hàng' ?></a>
                </div>
            </div>
        </div>



        <div class="container text-center pt-4">
            <div class="row">
                <div class="col">
                    <h4 class="fw-semibold mb-4">Sản phẩm đã bán ra</h4>

                    <table class="table table-primary table-gradient-blue " id="list_bill">
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Product Img</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>

                        <?php foreach ($list_bill as $bill) :
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $bill['product_name'] ?></td>
                                <td> <img src="<?= $bill['product_img'] ?>"> </td>
                                <td><?= $bill['quantity'] ?></td>
                                <td><?= number_format($bill['total']) . '.000 VNĐ' ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

                </div>

                <div class="col">
                    <h4 class="fw-semibold mb-4">Sản phẩm bán chạy</h4>

                    <table class="table table-warning table-gradient-yellow">
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Product Img</th>
                            <th>Product Price</th>
                        </tr>

                        <?php foreach ($list_most as $pro) :
                            $ii++ ?>
                            <tr>
                                <td><?= $ii ?></td>
                                <td><?= $pro['product_name'] ?></td>
                                <td> <img src="<?= $pro['product_img'] ?>"></td>
                                <td><?= $pro['price'] ?>.000 VNĐ</td>
                            </tr>

                        <?php endforeach; ?>

                    </table>
                </div>

            </div>
        </div>
</section>
