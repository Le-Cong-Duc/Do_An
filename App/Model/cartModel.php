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

    function get_all_order_1()
    {
        $sql = 'SELECT * FROM order_bill WHERE status = 0 ';
        return $this->db->get_all($sql);
    }

    function get_all_order_ship()
    {
        $sql = 'SELECT * FROM order_bill WHERE status IN(2,3) ORDER BY status ';
        return $this->db->get_all($sql);
    }

    function get_all_order_4()
    {
        $sql = 'SELECT * FROM order_bill WHERE status BETWEEN 1 AND 3';
        return $this->db->get_all($sql);
    }

    function update_status_duyet($order_id)
    {
        $sql = 'UPDATE order_bill SET status = 2 WHERE order_id =' . $order_id;
        return $this->db->exec($sql);
    }

    function update_status_huy($order_id)
    {
        $sql = 'UPDATE order_bill SET status = 1 WHERE order_id =' . $order_id;
        return $this->db->exec($sql);
    }

    function update_shipper($order_id)
    {
        $sql = 'UPDATE order_bill SET status = 3 WHERE order_id =' . $order_id;
        return $this->db->exec($sql);
    }

    function get_all_bill($limit)
    {
        $sql = 'SELECT * FROM bill LIMIT ' . $limit;
        return $this->db->get_all($sql);
    }

    function get_all_bill_by_id($customer_id, $limit)
    {
        $sql = 'SELECT * FROM bill  WHERE customer_id = ' . $customer_id . ' LIMIT ' . $limit;
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
