<?php
class HomeController extends BaseController
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
        
        
        $this->titePage = 'Da Nang Gorment';
        $this->View('home', $this->titePage, $this->data);
    }
}

?>