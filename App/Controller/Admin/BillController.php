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

        $this->data['list_order'] = $this->cart->get_all_order_1();
        $this->data['list_order_4'] = $this->cart->get_all_order_4();

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

    function search_order()
    {
        if (isset($_POST['btn_search'])) {
            $customer_name = $_POST['txt_search'];
        }

        $this->data['list_order'] = $this->cart->get_all_order_by_name($customer_name);

        $this->titePage = 'Search Order';

        $this->View('search_order', $this->titePage, $this->data);
    }

    function status_duyet()
    {
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];

            $this->cart->update_status_duyet($order_id);
            $this->order();
        }
    }

    function status_huy()
    {
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];

            $this->cart->update_status_huy($order_id);
            $this->order();
        }
    }
}
