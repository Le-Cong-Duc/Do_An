<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$list_customer = $data['list_customer'];
$total_list_customer = 0;
?>

<section id="container">
    <?php foreach ($list_customer as $customer) :
        $total_list_customer += 1; ?>
    <?php endforeach; ?>

    <label>
        <?= $total_list_customer ?> khách hàng
    </label>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th colspan="2"></th>
        </tr>


        <?php foreach ($list_customer as $customer) : ?>
            <tr>
                <td><?= $customer['customer_id'] ?></td>
                <td><?= $customer['customer_name'] ?></td>
                <td><?= $customer['customer_email'] ?></td>
                <td><?= $customer['customer_phone'] ?></td>
                <td><?= $customer['customer_adress'] ?></td>
                <td> <a href="index.php?action=update_customer&customer_id= <?= $customer['customer_id'] ?> "
                        class="btn btn-warning">Sửa</a> </td>
                <td> <a href="index.php?action=delete_customer&customer_id= <?= $customer['customer_id'] ?> "
                        class="btn btn-danger">Xóa</a> </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form class="mb-3" id="form_insert" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="name" placeholder="Customer Name" required>
            <input type="text" class="form-control" id="phone" placeholder="Numberphone" required>
        </div>

        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="email" placeholder="Email">
            <input type="text" class="form-control" id="address" placeholder="Customer Address">
        </div>

        <div class="input-group">
            <input type="submit" class="btn btn-success" name="insert" value="Thêm khách hàng">
        </div>

    </form>
</section>

<script>
    $(document).ready(function() {
        $('#form_insert').on('submit', function(e) {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val();
            e.preventDefault();

            $.ajax({
                method: 'post',
                url: "index.php?action=insert_customer",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    address: address
                },
                success: function(response) {
                    alert("Thêm khách hàng thành công!");
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    alert("Có lỗi xảy ra. Vui lòng thử lại.");
                }
            });
        });
    });
</script>