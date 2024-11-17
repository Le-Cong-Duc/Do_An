<?php
class CustomerController extends BaseController_A
{
    private $customer;

    function __construct()
    {
        $this->customer = new customerModel;
    }

    function customer()
    {
        $this->titePage = 'Customer';

        $this->data['list_customer'] = $this->customer->get_all_customer();

        $this->View('customer', $this->titePage, $this->data);
    }

    function delete_customer()
    {
        if (isset($_GET['customer_id'])) {
            $customer_id = $_GET['customer_id'];
        }
        $this->customer->delete_customer($customer_id);
        $this->customer();
    }

    function insert_customer()
    {
        if (isset($_POST['insert'])) {
            $customer_name = $_POST['name'];
            $customer_phone = $_POST['phone'];
            $customer_address = $_POST['address'];
            $customer_email = $_POST['email'];
            $customer_user = $_POST['user'];
            $customer_pass = $_POST['pass'];

            $this->customer->insert_customer($customer_name, $customer_email, $customer_phone, $customer_address, $customer_user, $customer_pass);
        }
        $this->customer();
    }

    function update_customer()
    {
        if (isset($_GET['customer_id'])) {
            $customer_id = $_GET['customer_id'];

            $this->data = $this->customer->get_one_customer($customer_id);

            $this->View('update_customer_form', $this->titePage, $this->data);
        }
        if(isset($_POST['customer_id'])){
            $customer_id = $_POST['customer_id'];
            $customer_name = $_POST['name'];
            $customer_phone = $_POST['phone'];
            $customer_address = $_POST['address'];
            $customer_email = $_POST['email'];
            $customer_user = $_POST['user'];
            $customer_pass = $_POST['pass'];

            $this->customer->update_customer($customer_id,$customer_name,$customer_email,$customer_phone,$customer_address,$customer_user,$customer_pass);
            $this->customer();
        }
    }
}

?>