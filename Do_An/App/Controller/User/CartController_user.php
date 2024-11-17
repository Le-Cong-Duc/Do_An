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
        $this->titePage = 'Cart';
        $this->View('cart_user', $this->titePage, $this->data);
    }

    function add_cart()
    {
        if (isset($_POST['add_cart'])) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_img = $_POST['product_img'];
            $product_price = $_POST['product_price'];

            $this->titePage = 'Add To Cart';
            $this->View('cart_user', $this->titePage, $this->data);
        }
        else{
            $this->titePage = 'No Cart';
            $this->View('cart_user', $this->titePage, $this->data);
        }
    }
}
?>