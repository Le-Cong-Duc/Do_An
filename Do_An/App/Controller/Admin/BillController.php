<?php
class BillController extends BaseController_A
{
    private $cart;

    function __construct()
    {
        $this->cart = new cartModel;
    }

    function order()
    {

        $this->titePage = 'order bill admin';

        $this->data['list_order'] = $this->cart->get_all_order();

        $this->View('order_admin', $this->titePage, $this->data);
    }

    function delete_order_bill()
    {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
        }
        $this->cart->delete_order_bill($order_id);
        $this->order();
    }

    function order_to_bill()
    {
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];
            $customer_id = $_POST['customer_id'];
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_img = $_POST['product_img'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            $customer_phone = $_POST['customer_phone'];
            $quantity = $_POST['quantity'];
            $total = $_POST['total_bill'];

            $this->cart->insert_bill($customer_id, $product_id, $product_name, $product_img,  $customer_name, $customer_email, $customer_phone, $customer_address,     $quantity, $total);
            $this->cart->delete_order_bill($order_id);
            $this->order();
        }
    }

    function search_order()
    {
        if (isset($_POST['btn_search'])) {
            $customer_name = $_POST['txt_search'];
        }

        $this->data['list_order'] = $this->cart->get_all_order_by_name($customer_name);

        $this->titePage = 'Search Order';

        $this->View('search_order', $this->titePage, $this->data);
    }
}
