<?php
class CartController_U extends BaseController_U
{
    private $cart;
    private $product;
    private $customer;
    function __construct()
    {
        $this->cart = new cartModel;
        $this->product = new productModel;
        $this->customer = new customerModel;
    }
    function index()
    {
        $this->titePage = 'Cart';
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
            $product_quantity = $_POST['hidden_quantity'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += $product_quantity;
            } else {

                $product = array(
                    'id' => $product_id,
                    'name' => $product_name,
                    'img' => $product_img,
                    'price' => $product_price,
                    'quantity' => $product_quantity
                );

                $_SESSION['cart'][$product_id] = $product;
            }

            $this->titePage = 'Cart';
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

    function check_cart()
    {
        if (isset($_POST['buy']) && isset($_SESSION['user_id'])) {
            $product_id = $_POST['product_id'];
            $total_bill = $_POST['total'];
            $customer_id = $_SESSION['user_id'];
            $quantity = $_SESSION['cart'][$product_id]['quantity'];

            $this->data['product'] = $this->product->get_one_product($product_id);
            $this->data['total'] = $total_bill;
            $this->data['quantity'] = $quantity;
            $this->data['customer'] = $this->customer->get_one_customer($customer_id);
        }
        $this->View('buy_cart', $this->titePage, $this->data);
    }

    function buy_cart()
    {
        if (isset($_POST['thanhtoan'])) {
            $customer_id = $_POST['customer_id'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_phone = $_POST['customer_phone'];
            $customer_address = $_POST['customer_address'];
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_img = $_POST['product_img'];
            $quantity = $_POST['quantity'];
            $total = $_POST['total'];
            $status = 'Chưa duyệt';
            $payment = $_POST['payment'];

            if ($payment = 'Thanh toán khi nhận hàng') {
                $payment = 1;
            } else {
                $payment = 0;
            }

            echo $quantity;

            $this->cart->insert_order($customer_id, $product_id, $product_name, $product_img, $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total, $status, $payment);
            unset($_SESSION['cart'][$product_id]);
            echo "<script>alert('Đặt hàng thành công!');</script>";
            echo "<script>window.location.href='index.php?action=show_cart_u';</script>";
        }
    }

}
