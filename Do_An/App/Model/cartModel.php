<?php
class cartModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }


    function get_all_order()
    {
        $sql = 'SELECT * FROM order_bill ORDER BY status';
        return $this->db->get_all($sql);
    }

    function get_all_bill()
    {
        $sql = 'SELECT * FROM bill';
        return $this->db->get_all($sql);
    }

    function get_all_bill_by_id($customer_id)
    {
        $sql = 'SELECT * FROM bill  WHERE customer_id = ' . $customer_id . ' ';
        return $this->db->get_all($sql);
    }

    function get_all_order_by_name($customer_name)
    {
        $sql = 'SELECT * FROM order_bill WHERE customer_name LIKE "%' . $customer_name . '%"';

        return $this->db->get_all($sql);
    }

    function get_all_order_by_id($customer_id)
    {
        $sql = 'SELECT * FROM order_bill WHERE customer_id = ' . $customer_id . '';

        return $this->db->get_all($sql);
    }

    function delete_order_bill($order_id)
    {
        $sql = 'DELETE FROM order_bill WHERE order_id = ' . $order_id;
        
        return $this->db->exec($sql);
    }

    function update_order_bill($order_id, $status)
    {

        $sql = "UPDATE order_bill
            SET status ='$status'
            WHERE order_id = " . $order_id;

        return $this->db->exec($sql);
    }

    function insert_order($customer_id, $product_id, $product_name, $product_img, $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total, $status, $payment)
    {
        $sql = 'INSERT INTO order_bill(customer_id,product_id, product_name, product_img, customer_name, customer_email,customer_phone, customer_address, quantity ,total_bill, status, payment_method) 
        VALUE (' . $customer_id . ',' . $product_id . ',"' . $product_name . '","' . $product_img . '","' . $customer_name . '","' . $customer_email . '","' . $customer_phone . '","' . $customer_address . '",' . $quantity . ',' . $total . ',"' . $status . '",' . $payment . ')';
        return $this->db->exec($sql);
    }

    function insert_bill($customer_id, $product_id, $product_name, $product_img, $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total)
    {
        $sql = 'INSERT INTO bill(customer_id,product_id, product_name, product_img, customer_name, customer_email,customer_phone, customer_address, quantity ,total) 
        VALUE (' . $customer_id . ',' . $product_id . ',"' . $product_name . '","' . $product_img . '","' . $customer_name . '","' . $customer_email . '","' . $customer_phone . '","' . $customer_address . '",' . $quantity . ',' . $total . ')';
        return $this->db->exec($sql);
    }
}
