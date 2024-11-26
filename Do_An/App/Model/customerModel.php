<?php
class customerModel
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
    function get_all_customer()
    {
        $sql = 'SELECT * FROM customer WHERE role = 0 ORDER BY customer_id';

        return $this->db->get_all($sql);
    }

    function get_one_customer($customer_id)
    {
        $sql = 'SELECT * FROM customer WHERE customer_id = ' . $customer_id;

        return $this->db->get_one($sql);
    }

    function delete_customer($customer_id)
    {
        $sql = 'DELETE FROM customer WHERE customer_id = ' . $customer_id;
        return $this->db->exec($sql);
    }

    function insert_customer($customer_name, $customer_email, $customer_phone, $customer_address, $username, $password)
    {

        $sql = "INSERT INTO customer (customer_name,customer_email,customer_phone,customer_adress,username,password,role)
            VALUE('$customer_name','$customer_email','$customer_phone','$customer_address','$username','$password',0);";
        return $this->db->exec($sql);
    }

    function update_customer($customer_id, $customer_name, $customer_email, $customer_phone, $customer_address, $username, $password)
    {

        $sql = "UPDATE customer
            SET customer_name ='$customer_name' , customer_email = '$customer_email'
            , customer_phone = '$customer_phone', customer_adress =  '$customer_address'
            , username = '$username', password = '$password'
            WHERE customer_id = " . $customer_id;

        return $this->db->exec($sql);
    }

    function update_customer_a($customer_id, $customer_name, $customer_email, $customer_phone, $customer_address)
    {

        $sql = "UPDATE customer
            SET customer_name ='$customer_name' , customer_email = '$customer_email'
            , customer_phone = '$customer_phone', customer_adress =  '$customer_address'
            WHERE customer_id = " . $customer_id;

        return $this->db->exec($sql);
    }
}
