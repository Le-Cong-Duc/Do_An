<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "doan"; 

$conn = new mysqli($servername, $username, $password, $dbname, 3307);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['sign_user'];
    $input_password = $_POST['sign_pass'];



    $sql = "SELECT * FROM customer WHERE username = '$input_username' AND password = '$input_password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if ($input_password = $user['password']) {

            $_SESSION['user_id'] = $user['customer_id'];
            $_SESSION['username'] = $user['username'];

            if($user['role'] == 1){
                header("Location: /Do_an/index.php?action=admin");
            }
            else if($user['role'] == 0){
                header("Location: /Do_an/index.php?action=user");
            }
        } else {
            $error = "<span style='color: red;'> Sai mật khẩu. Vui lòng thử lại. </span>";
            require_once 'login_form.php';
            exit();
        }
    } else {
        $error = "Tài khoản không tồn tại. Vui lòng kiểm tra lại tên đăng nhập.";
    }

    $stmt->close();
    $conn->close();
}
?>