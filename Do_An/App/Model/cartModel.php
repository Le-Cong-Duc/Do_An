<?php
class cartModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }


    function get_all_bill()
    {
        $sql = 'SELECT * FROM bill ORDER BY status';
        return $this->db->get_all($sql);
    }

    function get_all_bill_by_name($customer_name)
    {
        $sql = 'SELECT * FROM bill WHERE customer_name LIKE "%' . $customer_name . '%"';

        return $this->db->get_all($sql);
    }

    function get_all_bill_by_id($customer_id)
    {
        $sql = 'SELECT * FROM bill WHERE customer_id = ' . $customer_id . '';

        return $this->db->get_all($sql);
    }

    function delete_bill($bill_id)
    {
        $sql = 'DELETE FROM bill WHERE bill_id = ' . $bill_id;
        return $this->db->exec($sql);
    }

    function update_bill($bill_id, $status)
    {

        $sql = "UPDATE bill
            SET status ='$status'
            WHERE bill_id = " . $bill_id;

        return $this->db->exec($sql);
    }

    function insert_bill($customer_id, $product_id, $product_name, $product_img, $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total, $status, $payment)
    {
        $sql = 'INSERT INTO bill(customer_id,product_id, product_name, product_img, customer_name, customer_email,customer_phone, customer_address, quantity ,total_bill, status, payment_method) 
        VALUE (' . $customer_id . ',' . $product_id . ',"' . $product_name . '","' . $product_img . '","' . $customer_name . '","' . $customer_email . '","' . $customer_phone . '","' . $customer_address . '",' . $quantity . ',' . $total . ',"' . $status . '",' . $payment . ')';
        return $this->db->exec($sql);
    }

}
