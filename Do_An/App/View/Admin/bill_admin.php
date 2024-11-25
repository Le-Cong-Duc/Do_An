<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$cart = new cartModel;

$html_bill = $cart->show_bill_a($data['list_bill']);
?>

<section id="main">
    <form action="index.php?action=search_bill" method="post" class="mb-3 d-flex search">
        <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success me-2" name="btn_search" type="submit">
            <i class="ti-search"></i>
        </button>
    </form>

    <table class="table">
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Product Name</th>
            <th>Product Img</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment method</th>
            <th colspan="2"></th>
        </tr>
        <?= $html_bill; ?>
    </table>
</section>

<script src="Public/js/view.js"></script>