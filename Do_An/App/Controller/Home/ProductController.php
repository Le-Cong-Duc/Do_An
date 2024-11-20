<?php
class ProductController extends BaseController
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
        $this->titePage = 'Product View';

        if (isset($_GET['category_id'])) {
            $category = $_GET['category_id'];
        } else {
            $category = 1;
        }

        $quantity = 20;

        $this->data['list_product'] = $this->product->get_all_product($category, $quantity);
        $this->data['list_category_id'] = $this->category->get_one_category($category);
        $this->data['page_1'] = $this->product->get_product_page($category, 0);
        $this->data['page_2'] = $this->product->get_product_page($category, 4);
        $this->data['page_3'] = $this->product->get_product_page($category, 8);

        $this->View('product', $this->titePage, $this->data);
    }


    function detail()
    {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
        } else {
            $product_id = 0;
        }

        $get_detail_product = $this->product->get_one_product($product_id);


        $this->titePage = 'Detail Product';

        $this->data['detail_product'] = $get_detail_product;

        $more_product = $this->product->get_all_product($get_detail_product['category_id'], 4);
        $this->data['more_product'] = $more_product;

        $this->View('detail_product', $this->titePage, $this->data);

    }

    function search()
    {
        if (isset($_POST['btn_search'])) {
            $product_name = $_POST['txt_search'];
        }
        $this->data['list_product'] = $this->product->get_all_product_by_name($product_name);
        $this->titePage = 'Search';
        $this->View('search', $this->titePage, $this->data);
    }


}

?>