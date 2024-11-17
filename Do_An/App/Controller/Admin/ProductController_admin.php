<?php
class ProductController_A extends BaseController_A
{
    private $product;
    private $category;

    function __construct()
    {
        $this->product = new productModel;
        $this->category = new catgoryModel;
    }
    function category()
    {
        $this->titePage = 'CAtegory';

        $this->data['list_category'] = $this->category->get_all_category();

        $this->View('category_admin', $this->titePage, $this->data);
    }

    function delete_category()
    {
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        $this->category->delete_category($category_id);

        $this->category();
    }

    function insert_category()
    {
        if (isset($_POST['insert'])) {
            $category_name = $_POST['name'];
            $img = basename($_FILES['image']['name']);
            $category_img = 'Public/img/' . $img;
            move_uploaded_file($_FILES['image']['tmp_name'], $category_img);

            $this->category->insert_category($category_name, $img);
        }
        $this->category();
    }

    function update_category()
    {
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];

            $this->data = $this->category->get_one_category($category_id);

            $this->View('update_category_form', $this->titePage, $this->data);
        }
        if (isset($_POST['update'])) {
            $img = basename($_FILES['image']['name']);
            $category_img = 'Public/img/' . $img;
            move_uploaded_file($_FILES['image']['tmp_name'], $category_img);
        } else {
            $img = '';
        }

        if (isset($_POST['category_id'])) {
            $category_id = $_POST['category_id'];
            $category_name = $_POST['name'];

            $this->category->update_category($category_id, $category_name, $img);
            $this->category();
        }
    }

    function product()
    {
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        } else {
            $category_id = 0;
        }
        $this->titePage = 'Da Nang Gorment';

        $this->data['category'] = $this->category->get_one_category($category_id);
        $this->data['list_category'] = $this->category->get_all_category();

        $this->data['list_product'] = $this->product->get_all_product($category_id, 50);



        $this->View('product_admin', $this->titePage, $this->data);
    }

    function delete_product()
    {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
        }

        $this->product->delete_product($product_id);

        $this->product();
    }

    function insert_product()
    {
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        } else {
            $category_id = 1;
        }

        if (isset($_POST['insert'])) {
            $product_name = $_POST['name'];
            $product_price = $_POST['price'];
            $product_status = $_POST['status'];
            if ($product_status = 'Còn') {
                $product_status = 1;
            } else {
                $product_status = 0;
            }
            $img = basename($_FILES['image']['name']);
            $category_img = 'Public/img/' . $img;
            move_uploaded_file($_FILES['image']['tmp_name'], $category_img);

            $this->product->insert_product($product_name, $img, $product_price, $product_status, $category_id);
        }
        $this->product();
    }

    function update_product()
    {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $this->data = $this->product->get_one_product($product_id);

            $this->View('update_product_form', $this->titePage, $this->data);
        }
        if (isset($_POST['update'])) {
            $img = basename($_FILES['image']['name']);
            $product_img = 'Public/img/' . $img;
            move_uploaded_file($_FILES['image']['tmp_name'], $product_img);
        } else {
            $img = '';
        }

        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['name'];
            $product_price = $_POST['price'];
            $product_status = $_POST['status'];
            if ($product_status = 'Còn') {
                $product_status = 1;
            } else {
                $product_status = 0;
            }

            $this->product->update_product($product_id, $product_name, $img, $product_price, $product_status);
            $this->product();
        }
    }

}

?>