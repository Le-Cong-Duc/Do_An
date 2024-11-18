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
    function show_product()
    {
        $html_cart = '';
        $total_bill = 0;
        if (count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $cart) {
                $total = $cart['price'] * $cart['quantity'];
                $total_bill += $total;
                $html_cart .=
                    '<tr>
                        <td>
                            <img src="' . $cart['img'] . '">
                        </td>
                        <td>
                            <h4>' . $cart['name'] . '</h4>
                        </td>
                        <td>
                            <h4>' . $cart['price'] . '.000 VND</h4>
                        </td>
                        <td>
                            <h4>' . $cart['quantity'] . '</h4>
                        </td>
                        <td>
                            <h4> ' . $total . '.000 VNĐ </h4>
                        </td>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>
                            <a href="index.php?action=delete_cart_u&product_id=' . $cart['id'] . '" class="btn btn-danger" type="submit" > Xóa </a>
                            <a href="#" class="btn btn-success" type="submit" > Mua </a>
                         </td>
                    </tr>';
            }
        }

        return ['html_cart' => $html_cart, 'total_bill' => $total_bill];
    }

}


?>