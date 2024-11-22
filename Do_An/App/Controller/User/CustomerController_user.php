<?php
class CustomerController_U extends BaseController_U
{
    private $customer;
    private $cart;
    function __construct()
    {
        $this->customer = new customerModel;
        $this->cart = new cartModel_U;
    }

    function user()
    {
        $this->titePage = 'Sản phẩm đã mua';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $this->data['list_bill'] = $this->cart->get_all_bill_by_id($user_id);
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
            echo '<script> alert("Thay đổi thông tin thành công !!!!"); </script>';
            $this->user();
        }

    }

}
?>