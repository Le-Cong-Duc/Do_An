<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

require_once "App/config/database.php";
require_once "App/Model/databaseModel.php";

require_once "App/Model/productModel.php";
require_once "App/Model/categoryModel.php";
require_once "App/Model/cartModel.php";
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
require_once "App/Controller/User/CustomerController_user.php";

require_once "App/Controller/Admin/BaseController_admin.php";
require_once "App/Controller/Admin/HomeController_admin.php";
require_once "App/Controller/Admin/BillController.php";
require_once "App/Controller/Admin/ProductController_admin.php";
require_once "App/Controller/Admin/CustomerController.php";

require_once "App/Controller/Shipper/BaseController_s.php";
require_once "App/Controller/Shipper/ShipperController.php";

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
        case 'buy_all_cart_u':
            $cart_u = new CartController_U;
            $cart_u->buy_all();
            break;
        case 'user_detail':
            $cart_u = new CustomerController_U;
            $cart_u->user();
            break;
        case 'sign_in':
            $sign = new SignInController;
            $sign->sign();
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
        case 'update_user_u':
            $user = new CustomerController_U;
            $user->update_user();
            break;

        case 'admin':
            $admin = new HomeController_A;
            $admin->index();
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
        case 'order_to_bill':
            $customer = new CustomerController_U;
            $customer->order_to_bill();
            break;
        case 'bill':
            $bill = new BillController;
            $bill->order();
            break;
        case 'delete_order':
            $bill = new BillController;
            $bill->delete_order_bill();
            break;
        case 'admin_duyet':
            $bill = new BillController;
            $bill->status_duyet();
            break;
        case 'admin_huy':
            $bill = new BillController;
            $bill->status_huy();
            break;
        case 'search_order':
            $bill = new BillController;
            $bill->search_order();
            break;
        case 'shipper':
            $ship = new ShipperController;
            $ship->shipper();
            break;
        case 'check_ship':
            $ship = new ShipperController;
            $ship->check_ship();
            break;
        default:
            break;
    }
} else {
    $homepage = new HomeController;
    $homepage->index();
}
