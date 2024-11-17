<?php
class cartModel_U
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }

    function get_all_order()
    {
        $sql = 'SELECT * FROM `order`';

        return $this->db->get_all($sql);
    }
    function show_product($list_product)
    {
        $html_list_product = '';
        foreach ($list_product as $product) {

            $html_list_product .=
                '<tr>
                    <td>
                        <img src ="Public/img/' . $product['product_img'] . '">
                    </td>
                    <td>
                        <h4>' . $product['product_name'] . '</h4>
                    </td>
                    <td>
                         <h4>' . $product['price'] . '</h4>
                    </td>
                    <td>
                        <h4>' . $product['quantity'] . '</h4>
                    </td>
                    <td>
                         <h4>' . $product['total'] . '</h4>
                    </td>
                    <td>
                         <input type="checkbox">
                    </td>
                </tr>';
        }

        return $html_list_product;
    }

}


?>