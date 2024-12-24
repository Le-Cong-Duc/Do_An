<?php
class CustomerController_U extends BaseController_U
{
    private $customer;
    private $cart;
    function __construct()
    {
        $this->customer = new customerModel;
        $this->cart = new cartModel;
    }

    function user()
    {
        $this->titePage = 'User';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $this->data['list_order'] = $this->cart->get_all_order_by_id($user_id);
            $this->data['list_bill'] = $this->cart->get_all_bill_by_id($user_id, 4);
            $this->data['list_bill_more'] = $this->cart->get_all_bill_by_id($user_id, 20);
            $this->data['list_customer'] = $this->customer->get_one_customer($user_id);
        }

        $this->View('user', $this->titePage, $this->data);
    }

    function update_user()
    {
        if (isset($_POST['customer_id'])) {
            $customer_id = $_POST['customer_id'];
            $customer_name = $_POST['customer_name'];
            $customer_phone = $_POST['customer_phone'];
            $customer_address = $_POST['customer_address'];
            $customer_email = $_POST['customer_email'];
            $customer_user = $_POST['username'];
            $customer_pass = $_POST['password'];

            $this->customer->update_customer($customer_id, $customer_name, $customer_email, $customer_phone, $customer_address, $customer_user, $customer_pass);
            $this->user();
        }
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

            $this->cart->insert_bill($customer_id, $product_id, $product_name, $product_img,  $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total);
            $this->cart->delete_order_bill($order_id);
            $this->user();
        }
    }

}
