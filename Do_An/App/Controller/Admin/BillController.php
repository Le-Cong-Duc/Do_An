<?php
class BillController extends BaseController_A
{
    private $cart;

    function __construct()
    {
        $this->cart = new cartModel;
    }

    function bill()
    {

        $this->titePage = 'Bill admin';
        
        $this->data['list_bill'] = $this->cart->get_all_bill();

        $this->View('bill_admin', $this->titePage, $this->data);
    }

    function delet_bill()
    {
        if (isset($_GET['bill_id'])) {
            $bill_id = $_GET['bill_id'];
        }
        $this->cart->delete_bill($bill_id);
        $this->bill();
    }

    function update_bill()
    {
        if (isset($_GET['bill_id'])) {
            $bill_id = $_GET['bill_id'];
            $status = 'đã duyệt';

            $this->cart->update_bill($bill_id, $status);
            $this->bill();
        }
    }

    function search_bill()
    {
        if (isset($_POST['btn_search'])) {
            $customer_name = $_POST['txt_search'];
        }

        $this->data['list_bill'] = $this->cart->get_all_bill_by_name($customer_name);

        $this->titePage = 'Search Bill';

        $this->View('search_bill', $this->titePage, $this->data);
    }

}

?>