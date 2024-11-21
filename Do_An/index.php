<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

require_once "App/config/database.php";
require_once "App/Model/databaseModel.php";

require_once "App/Model/productModel.php";
require_once "App/Model/categoryModel.php";
require_once "App/Model/cartModel_user.php";
require_once "App/Model/customerModel.php";
require_once "App/Model/SignInModel.php";

require_once "App/Controller/Home/SignInController.php";
require_once "App/Controller/Home/BaseController.php";
require_once "App/Controller/Home/HomeController.php";
require_once "App/Controller/Home/ProductController.php";

require_once "App/Controller/User/BaseController_user.php";
require_once "App/Controller/User/HomeController_user.php";
require_once "App/Controller/User/ProductController_user.php";
require_once "App/Controller/User/CartController_user.php";

require_once "App/Controller/Admin/BaseController_admin.php";
require_once "App/Controller/Admin/HomeController_admin.php";
require_once "App/Controller/Admin/BillController.php";
require_once "App/Controller/Admin/ProductController_admin.php";
require_once "App/Controller/Admin/CustomerController.php";


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'product':
            $product = new ProductController;
            $product->index();
            break;
        case 'product_u':
            $product_u = new ProductController_U;
            $product_u->index();
            break;
        case 'detail_product':
            $detail_product = new ProductController;
            $detail_product->detail();
            break;
        case 'detail_product_u':
            $detail_product_u = new ProductController_U;
            $detail_product_u->detail();
            break;
        case 'cart':
            include 'App/View/Home/cart.php';
            break;
        case 'show_cart_u':
            $cart_u = new CartController_U;
            $cart_u->index();
            break;
        case 'add_cart_u':
            $cart_u = new CartController_U;
            $cart_u->add_cart();
            break;
        case 'delete_all_cart_u':
            $cart_u = new CartController_U;
            $cart_u->delete_all_cart();
            break;
        case 'delete_cart_u':
            $cart_u = new CartController_U;
            $cart_u->delete_cart();
            break;
        case 'check_cart_u':
            $cart_u = new CartController_U;
            $cart_u->check_cart();
            break;
        case 'buy_cart_u':
            $cart_u = new CartController_U;
            $cart_u->buy_cart();
            break;
        case 'bill_u':
            $cart_u = new CartController_U;
            $cart_u->bill_cart();
            break;
        case 'sign_in':
            $sign = new SignInController;
            $sign->sign();
            // $sign->ajax_sign_in();
            break;
        case 'register':
            $sign = new SignInController;
            $sign->regis();
            break;
        case 'search':
            $search = new ProductController;
            $search->search();
            break;
        case 'search_u':
            $search = new ProductController_U;
            $search->search();
            break;
        case 'search_a':
            $search = new ProductController_A;
            $search->search();
            break;
        case 'user':
            $user = new HomeController_U;
            $user->index();
            break;

        case 'admin':
            include("App/View/Admin/home_admin.php");
            break;
        case 'category_a':
            $category_a = new ProductController_A;
            $category_a->category();
            break;
        case 'delete_category':
            $category_a = new ProductController_A;
            $category_a->delete_category();
            break;
        case 'insert_category':
            $category_a = new ProductController_A;
            $category_a->insert_category();
            break;
        case 'update_category':
            $category_a = new ProductController_A;
            $category_a->update_category();
            break;
        case 'product_a':
            $product_a = new ProductController_A;
            $product_a->product();
            break;
        case 'delete_product':
            $product_a = new ProductController_A;
            $product_a->delete_product();
            break;
        case 'insert_product':
            $category_a = new ProductController_A;
            $category_a->insert_product();
            break;
        case 'update_product':
            $category_a = new ProductController_A;
            $category_a->update_product();
            break;
        case 'customer':
            $customer = new CustomerController;
            $customer->customer();
            break;
        case 'delete_customer':
            $customer = new CustomerController;
            $customer->delete_customer();
            break;
        case 'insert_customer':
            $customer = new CustomerController;
            $customer->insert_customer();
            break;
        case 'update_customer':
            $customer = new CustomerController;
            $customer->update_customer();
            break;
        case 'bill':
            $bill = new BillController;
            $bill->bill();
            break;
        case 'delete_bill':
            $bill = new BillController;
            $bill->delet_bill();
            break;
        case 'update_bill':
            $bill = new BillController;
            $bill->update_bill();
            break;
        case 'search_bill':
            $bill = new BillController;
            $bill->search_bill();
            break;
        default:
            break;
    }
} else {
    $homepage = new HomeController;
    $homepage->index();
}
?>