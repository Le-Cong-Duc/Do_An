<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$customer = new customerModel;

$html_customer = $customer->show_customer($data['list_customer']);
?>

<section id="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Username</th>
            <th>Password</th>
            <th colspan="2"></th>
        </tr>
        <?= $html_customer; ?>
    </table>
    <form class="mb-3" action="index.php?action=insert_customer" method="post" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <input type="text" class="form-control" name="name" placeholder="Customer Name" required>
            <input type="text" class="form-control" name="phone" placeholder="Numberphone" required>
        </div>

        <div class="mb-3 input-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <input type="text" class="form-control" name="address" placeholder="Customer Address">
        </div>

        <div class="mb-3 input-group">
            <input type="text" class="form-control" name="user" placeholder="Username" required>
            <input type="text" class="form-control" name="pass" placeholder="password" required>
        </div>
        <div class="input-group">
            <input type="submit" class="btn btn-success" name="insert" value="Thêm khách hàng">
        </div>

    </form>
</section>