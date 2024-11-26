<?php
class cartModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }


    function get_all_bill()
    {
        $sql = 'SELECT * FROM bill ORDER BY status';
        return $this->db->get_all($sql);
    }

    function get_all_bill_by_name($customer_name)
    {
        $sql = 'SELECT * FROM bill WHERE customer_name LIKE "%' . $customer_name . '%"';

        return $this->db->get_all($sql);
    }

    function get_all_bill_by_id($customer_id)
    {
        $sql = 'SELECT * FROM bill WHERE customer_id = ' . $customer_id . '';

        return $this->db->get_all($sql);
    }

    function get_bill_by_status($customer_id)
    {
        $sql = 'SELECT * FROM bill WHERE customer_id = ' . $customer_id . '& status = "Chưa duyệt" ';

        return $this->db->get_all($sql);
    }

    function delete_bill($bill_id)
    {
        $sql = 'DELETE FROM bill WHERE bill_id = ' . $bill_id;
        return $this->db->exec($sql);
    }

    function update_bill($bill_id, $status)
    {

        $sql = "UPDATE bill
            SET status ='$status'
            WHERE bill_id = " . $bill_id;

        return $this->db->exec($sql);
    }

    function insert_bill($customer_id, $product_id, $product_name, $product_img, $customer_name, $customer_email, $customer_phone, $customer_address, $quantity, $total, $status, $payment)
    {
        $sql = 'INSERT INTO bill(customer_id,product_id, product_name, product_img, customer_name, customer_email,customer_phone, customer_address, quantity ,total_bill, status, payment_method) 
        VALUE (' . $customer_id . ',' . $product_id . ',"' . $product_name . '","' . $product_img . '","' . $customer_name . '","' . $customer_email . '","' . $customer_phone . '","' . $customer_address . '",' . $quantity . ',' . $total . ',"' . $status . '",' . $payment . ')';
        return $this->db->exec($sql);
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
                            <a href="index.php?action=delete_cart_u&product_id=' . $cart['id'] . '" class="btn btn-danger" type="submit" > Xóa </a>
                        </td>
                        <td>
                            <form action="index.php?action=check_cart_u" method="post">
                                <input type="hidden" name="product_id" value = "' . $cart['id'] . '" >
                                <input type="hidden" name="total" value = "' . $total . '" >
                                <button class="btn btn-success" type="submit" name="buy"> Mua </button>
                            </form>

                            
                         </td>
                    </tr>';
            }
        }

        return ['html_cart' => $html_cart, 'total_bill' => $total_bill];
    }

    function show_bill_a($list_bill)
    {
        $html_list_bill = '';
        foreach ($list_bill as $bill) {
            if ($bill['payment_method'] == 1) {
                $bill['payment_method'] = 'Thanh toán khi nhận hàng';
            } else {
                $bill['payment_method'] = 'Thanh toán bằng chuyển khoản';
            }

            $html_list_bill .=
                '<tr>
                <td>' . $bill['customer_name'] . '</td>
                <td>' . $bill['customer_email'] . '</td>
                <td>' . $bill['customer_phone'] . '</td>
                <td>' . $bill['customer_address'] . '</td>
                <td>' . $bill['product_name'] . '</td>
                <td> <img src="' . $bill['product_img'] . '" width = 150px > </td>
                <td>' . $bill['quantity'] . '</td>
                <td>' . $bill['total_bill'] . '</td>
                <td>' . $bill['status'] . '</td>
                <td>' . $bill['payment_method'] . '</td>
                
                <td>
                     <a href="index.php?action=delete_bill&bill_id= ' . $bill['bill_id'] . ' "
                        class="btn btn-danger">Xóa
                    </a> 
                </td>
                <td>
                    <a href="index.php?action=update_bill&bill_id= ' . $bill['bill_id'] . '"
                        class="btn btn-success">Duyệt
                    </a>
                </td>
            </tr>';
        }
        return $html_list_bill;
    }


    function show_bill_u($list_bill)
    {
        $html_list_bill = '';
        foreach ($list_bill as $bill) {

            $html_list_bill .=
                '<tr>
                <td> <img src="' . $bill['product_img'] . '" width = 150px > </td>
                <td>' . $bill['product_name'] . '</td>
                <td>' . $bill['quantity'] . '</td>
                <td>' . $bill['total_bill'] . '</td>
            </tr>';
        }
        return $html_list_bill;
    }
}
