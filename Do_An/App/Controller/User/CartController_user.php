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
            $IDSP = $_POST['IDSP'];
            $name = $_POST['name'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $quantity = 1;

            $product = array(
                'id' => $IDSP,
                'name' => $name,
                'img' => $img,
                'price' => $price,
                'quantity' => $quantity
            );

            $_SESSION['cart'][$IDSP] = $product;
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