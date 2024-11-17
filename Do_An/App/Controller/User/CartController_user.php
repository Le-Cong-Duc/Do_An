<?php
class CartController_U extends BaseController_U
{
    private $cart;
    function __construct()
    {
        $this->cart = new cartModel_U;

    }
    function index()
    {
        $this->titePage = 'Add To Cart';
        $this->View('cart_user', $this->titePage, $this->data);
    }

    function add_cart()
    {

    }
}
?>