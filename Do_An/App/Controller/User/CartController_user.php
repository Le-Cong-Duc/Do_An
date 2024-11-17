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
        $this->titePage = 'No Cart';
        if (isset($_POST['add_cart'])) {

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_img = $_POST['product_img'];
            $product_price = $_POST['product_price'];
            $product_quantity = $_POST['product_quantity'];

            $product = array(
                'id' => $product_id,
                'name' => $product_name,
                'img' => $product_img,
                'price' => $product_price,
                'quantity' => $product_quantity
            );


            $_SESSION['cart'][$product_id] = $product;
            $this->titePage = 'Add To Cart';
        }
        $this->View('cart_user', $this->titePage, $this->data);
    }

    function delete_all_cart()
    {
        if (count($_SESSION['cart']) > 0) {
            $_SESSION['cart'] = [];
        }
        header('location: index.php?action=user');
    }

    function delete_cart()
    {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
        }
        unset($_SESSION['cart'][$product_id]);

        $this->View('cart_user', $this->titePage, $this->data);
    }
}
?>