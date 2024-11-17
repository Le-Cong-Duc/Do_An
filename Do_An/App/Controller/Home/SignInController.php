<?php
session_start();
ob_start();
class SignInController
{
    private $sign;
    function __construct()
    {
        $this->sign = new SignInModel;
    }
    function sign()
    {
        include("App/View/Home/login_form.php");
        if (isset($_POST['dangnhap'])) {
            $username = $_POST['sign_user'];
            $password = $_POST['sign_pass'];

            $result = $this->sign->sign_in($username, $password);

            if ($password = $result['password']) {
                $_SESSION['user_id'] = $result['customer_id'];
                $_SESSION['username'] = $result['username'];

                if ($result['role'] == 1) {
                    header("Location: index.php?action=admin");
                } else if ($result['role'] == 0) {
                    header("Location: index.php?action=user");
                }
            } else {
                header('location: /Do_an/index.php?action=sign_in');
            }
        }
    }

    function regis()
    {
        include("App/View/Home/login_form.php");
        
        if (isset($_POST['dangki'])) {
            $name = $_POST['regis_name'];
            $user = $_POST['regis_user'];
            $pass = $_POST['regis_pass'];
            $email = $_POST['regis_email'];
            $phone = $_POST['regis_phone'];
            $address = $_POST['regis_address'];

            $result = $this->sign->register($name, $email, $phone, $address, $user, $pass);

            header('location: /Do_an/index.php?action=sign_in');
        }
    }
}
?>