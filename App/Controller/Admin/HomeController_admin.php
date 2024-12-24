<?php
class HomeController_A extends BaseController_A
{
    private $product;
    private $customer;
    private $cart;

    function __construct()
    {
        $this->product = new productModel;
        $this->customer = new customerModel;
        $this->cart = new cartModel;
    }

    function index()
    {
        $this->data['list_bill'] = $this->cart->get_all_bill(100);

        $this->data['list_product'] = $this->product->get_all_product(0, 0);
        $this->data['list_customer'] = $this->customer->get_all_customer();

        $this->data['most_product'] = $this->product->get_most_product(10, 0);

        $this->titePage = 'Admin Home';

        $this->View('home_admin', $this->titePage, $this->data);
    }
}
