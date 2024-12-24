<?php
class ShipperController extends BaseController_S
{
    private $cart;
    function __construct()
    {
        $this->cart = new cartModel;
    }

    function shipper()
    {
        $this->titePage = 'User';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            $this->data['list_order'] = $this->cart->get_all_order_ship();
        }
        $this->View('Vanchuyen', $this->titePage, $this->data);
    }

    function check_ship()
    {
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];

            $this->cart->update_shipper($order_id);
            $this->shipper();
        }
    }
}
