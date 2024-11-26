<?php
class productModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }

    function get_all_product_by_name($product_name)
    {
        $sql = 'SELECT * FROM product WHERE product_name LIKE "%' . $product_name . '%"';

        return $this->db->get_all($sql);
    }
    function get_all_product($category_id, $limit)
    {
        $sql = 'SELECT * FROM product ';

        if ($category_id == 1) {
            $sql .= ' WHERE category_id = 1 limit ' . $limit;
        } else if ($category_id == 2) {
            $sql .= ' WHERE category_id = 2 limit ' . $limit;
        } else if ($category_id == 3) {
            $sql .= ' WHERE category_id = 3 limit ' . $limit;
        } else if ($category_id == 4) {
            $sql .= ' WHERE category_id = 4 limit ' . $limit;
        } else {
            $sql .= 'WHERE 1';
        }
        return $this->db->get_all($sql);
    }

    function get_product_page($category_id, $offset)
    {
        $sql = 'SELECT * FROM product Where category_id = ' . $category_id . ' LIMIT  4 OFFSET ' . $offset;
        return $this->db->get_all($sql);
    }
    function get_one_product($product_id)
    {
        $sql = 'SELECT * FROM product WHERE product_id =' . $product_id;
        return $this->db->get_one($sql);
    }

    function delete_product($product_id)
    {
        $sql = 'DELETE FROM product WHERE product_id = ' . $product_id;
        return $this->db->exec($sql);
    }

    function insert_product($product_name, $product_img, $product_price, $product_status, $category_id)
    {
        if ($product_img != '') {
            $sql = "INSERT INTO product (product_name,product_img,price,status,category_id)
            VALUE('$product_name', 'Public/img/$product_img' ,$product_price ,$product_status,$category_id );";
        } else {
            $sql = "INSERT INTO product (product_name,price,status,category_id)
            VALUE('$product_name',$product_price,$product_status,$category_id);";
        }
        return $this->db->exec($sql);
    }

    function update_product($product_id, $product_name, $product_img, $product_price, $product_status)
    {
        if ($product_img != '') {
            $sql = "UPDATE product
                    SET product_name =  '$product_name ', product_img = 'Public/img/$product_img ', price = $product_price, status = $product_status
                    WHERE product_id = " . $product_id;
        } else {
            $sql = "UPDATE product
            SET product_name ='$product_name' , price = $product_price, status = $product_status 
            WHERE product_id = " . $product_id;
        }
        return $this->db->exec($sql);
    }


    function show_product($list_product)
    {
        $evaluate = '';

        $html_list_product = '';
        foreach ($list_product as $product) {

            if ($product['evaluate'] == 1) {
                $evaluate = '<i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 2) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 3) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 4) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 5) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            }

            $html_list_product .=

                '<a  href = "index.php?action=detail_product&product_id=' . $product['product_id'] . '"" class ="pro" >
                <img src="' . $product['product_img'] . ' " width="300" height="300" alt="">
                <div class="des">
                    <h5>
                        ' . $product['product_name'] . '
                    </h5>
                    <div class="star">                    
                        ' . $evaluate . '
                    </div>
                
                    <h4>
                        ' . $product['price'] . '.000 VND' . '
                    </h4>
                </div>

            </a>';
        }

        return $html_list_product;
    }

    function show_product_u($list_product)
    {
        $evaluate = '';

        $html_list_product = '';
        foreach ($list_product as $product) {

            if ($product['evaluate'] == 1) {
                $evaluate = '<i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 2) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 3) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 4) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            } else if ($product['evaluate'] == 5) {
                $evaluate = '<i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i>';
            }

            $html_list_product .=

                '<a href = "index.php?action=detail_product_u&product_id=' . $product['product_id'] . '"" class ="pro" >
                <img src="' . $product['product_img'] . ' " width="300" height="300" alt="">
                <div class="des">
                <h5>
                ' . $product['product_name'] . '
                </h5>
                <div class="star">                    
                ' . $evaluate . '
                </div>

                <h4>
                ' . $product['price'] . '.000 VND' . '
                </h4>
                </div>

                <form action = "index.php?action=add_cart_u" method = "post">
                <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                <input type="hidden" name="product_name" value="' . $product['product_name'] . '">
                <input type="hidden" name="product_img" value="' . $product['product_img'] . '">
                <input type="hidden" name="product_price" value="' . $product['price'] . '">
                <input type="hidden" name="hidden_quantity" id="hidden_quantity" value="1">
                <button class="btn" type="submit" name="add_cart" >
                    <i class="fal ti-shopping-cart cart"></i>
                </button>
            </form>
              
            </a>';
        }

        return $html_list_product;
    }

}
?>