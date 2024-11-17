<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>


<section id="container">
    <form class="mb-3" action="index.php?action=update_customer" method="post" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="name" value="<?= $data['customer_name'] ?>">
        </div>
        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Customer phone:</label>
            <input type="text" class="form-control" name="phone" value="<?= $data['customer_phone'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Category email:</label>
            <input type="text" class="form-control" name="email" value="<?= $data['customer_email'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Category address:</label>
            <input type="text" class="form-control" name="address" value="<?= $data['customer_adress'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Category username:</label>
            <input type="text" class="form-control" name="user" value="<?= $data['username'] ?>">
        </div>

        <div class="mb-3 input-group">
            <label style="width: 20%;" class="form-label">Category password:</label>
            <input type="text" class="form-control" name="pass" value="<?= $data['password'] ?>">
        </div>
        <div class="input-group">
            <input type="hidden" name="customer_id" value="<?= $data['customer_id'] ?>">
            <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
        </div>

    </form>
</section>