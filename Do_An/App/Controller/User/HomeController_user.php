<?php
class HomeController_U extends BaseController_U
{
    private $product;
    private $category;

    function __construct()
    {
        $this->product = new productModel;
        $this->category = new catgoryModel;
    }
    function index()
    {

        $this->data['list_category'] = $this->category->get_all_category();

        $this->data['list_product_1'] = $this->product->get_all_product(1, 7);
        $this->data['list_product_2'] = $this->product->get_all_product(2, 7);
        $this->data['list_product_3'] = $this->product->get_all_product(3, 7);
        $this->data['list_product_4'] = $this->product->get_all_product(4, 7);

        $this->data['page_1_1'] = $this->product->get_product_page(1, 0);
        $this->data['page_1_2'] = $this->product->get_product_page(1, 4);
        $this->data['page_2_1'] = $this->product->get_product_page(2, 0);
        $this->data['page_2_2'] = $this->product->get_product_page(2, 4);
        $this->data['page_3_1'] = $this->product->get_product_page(3, 0);
        $this->data['page_3_2'] = $this->product->get_product_page(3, 4);
        $this->data['page_4_1'] = $this->product->get_product_page(4, 0);
        $this->data['page_4_2'] = $this->product->get_product_page(4, 4);

        $this->data['most_product'] = $this->product->get_most_product(4, 0);
        $this->data['most_product_2'] = $this->product->get_most_product(4, 4);

        $this->titePage = 'Home User';

        $this->View('home_user', $this->titePage, $this->data);
    }
}
