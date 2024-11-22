<?php require("header_admin.php") ?>
<?php require("navbar_admin.php") ?>
<?php
$customer = new customerModel;

$data = $customer->show_customer($data['list_customer']);
$html_customer = $data['html_list_customer'];
$html_total = $data['total_customer'];
?>

<section id="container">
    <label>
        <?= $html_total ?> khách hàng
    </label>
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

    <form class="mb-3" id="form_insert" enctype="multipart/form-data">

        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="name" placeholder="Customer Name" required>
            <input type="text" class="form-control" id="phone" placeholder="Numberphone" required>
        </div>

        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="email" placeholder="Email">
            <input type="text" class="form-control" id="address" placeholder="Customer Address">
        </div>

        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="user" placeholder="Username" required>
            <input type="text" class="form-control" id="pass" placeholder="password" required>
        </div>
        <div class="input-group">
            <input type="submit" class="btn btn-success" name="insert" value="Thêm khách hàng">
        </div>

    </form>
</section>
<!-- action="index.php?action=insert_customer" method="post" -->
<script>
    $(document).ready(function () {
        $('#form_insert').on('submit', function (e) {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var user = $('#user').val();
            var pass = $('#pass').val();
            e.preventDefault();

            $.ajax({
                method: 'post',
                url: "index.php?action=insert_customer",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    address: address,
                    user: user,
                    pass: pass
                },
                success: function (response) {
                    alert("Thêm khách hàng thành công!");
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Có lỗi xảy ra. Vui lòng thử lại.");
                }
            });
        });
    });
</script>