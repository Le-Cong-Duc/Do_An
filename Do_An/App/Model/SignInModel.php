<?php
class SignInModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }

    function sign_in($username, $password)
    {
        $sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
        return $this->db->get_one($sql);
    }

    function register($customer_name, $customer_email, $customer_phone, $customer_address, $username, $password)
    {

        $sql = "INSERT INTO customer (customer_name,customer_email,customer_phone,customer_adress,username,password,role)
            VALUE('$customer_name','$customer_email','$customer_phone','$customer_address','$username','$password',0);";
        return $this->db->exec($sql);
    }
}
?>