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
        $sql = 'SELECT * FROM customer WHERE customer_id = ' . $customer_id . ' ORDER BY customer_id';

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
    function show_customer($list_customer)
    {
        $html_list_category = '';
        foreach ($list_customer as $customer) {
            $html_list_category .=
                '<tr>
            <td>' . $customer['customer_id'] . '</td>
            <td>' . $customer['customer_name'] . '</td>
            <td>' . $customer['customer_email'] . '</td>
            <td>' . $customer['customer_phone'] . '</td>
            <td>' . $customer['customer_adress'] . '</td>
            <td>' . $customer['username'] . '</td>
            <td>' . $customer['password'] . '</td>
            <td> <a href="index.php?action=update_customer&customer_id= ' . $customer['customer_id'] . ' "
                    class="btn btn-warning">Sửa</a> </td>
            <td> <a href="index.php?action=delete_customer&customer_id= ' . $customer['customer_id'] . ' "
                    class="btn btn-danger">Xóa</a> </td>
        </tr>';
        }
        return $html_list_category;
    }


}
?>