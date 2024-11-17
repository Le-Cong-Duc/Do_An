<?php
class catgoryModel
{
    private $db;

    function __construct()
    {
        $this->db = new databaseModel;
    }

    function get_all_category()
    {
        $sql = 'SELECT * FROM category ORDER BY category_id';

        return $this->db->get_all($sql);
    }

    function get_one_category($category_id)
    {
        $sql = 'SELECT * FROM category WHERE category_id= ' . $category_id;
        return $this->db->get_one($sql);
    }

    function insert_category($category_name, $category_img)
    {
        if ($category_img != '') {
            $sql = "INSERT INTO category (category_name,category_img)
            VALUE('$category_name', 'Public/img/$category_img' );";
        } else {
            $sql = "INSERT INTO category (category_name)
            VALUE('$category_name');";
        }
        return $this->db->exec($sql);
    }

    function delete_category($category_id)
    {
        $sql = 'DELETE FROM category WHERE category_id = ' . $category_id;
        return $this->db->exec($sql);
    }

    function update_category($category_id, $category_name, $category_img)
    {
        if ($category_img != '') {
            $sql = "UPDATE category
                    SET category_name =  '$category_name ', category_img = 'Public/img/$category_img '
                    WHERE category_id = " . $category_id;
        } else {
            $sql = "UPDATE category
            SET category_name ='$category_name' WHERE category_id = " . $category_id;
        }
        return $this->db->exec($sql);
    }


    function show_category_a($list_category)
    {
        $html_list_category = '';
        foreach ($list_category as $category) {
            $html_list_category .=
                ' <tr>
                <td>' . $category['category_id'] . '</td>
                <td>' . $category['category_name'] . '</td>
                <td><img src="' . $category['category_img'] . '"> </td>
                <td> <a href ="index.php?action=update_category&category_id= ' . $category['category_id'] . ' " class="btn btn-warning">Sửa</a>  </td>
                <td> <a href ="index.php?action=delete_category&category_id= ' . $category['category_id'] . ' " class="btn btn-danger">Xóa</a>  </td>
            </tr>';
        }
        return $html_list_category;
    }

    function show_nav_category_a($list_category)
    {
        $html_list_category = '';
        foreach ($list_category as $category) {
            $html_list_category .=
                '<li> <a href="index.php?action=product_a&category_id=' . $category['category_id'] . '">' . $category['category_name'] . '</a></li>';
        }
        return $html_list_category;
    }

    function show_category($list_category)
    {
        $html_list_category = '';
        foreach ($list_category as $category) {
            $html_list_category .=
                '<a href="index.php?action=product&category_id=' . $category['category_id'] . '">
                <div class="card">
                    <img src="' . $category['category_img'] . '">
                    <div class="card-body">
                        <h5 class="card-title">ĐẶC SẢN ĐÀ NẴNG </h5>
                        <p class="card-text">
                            ' . $category['category_name'] . '
                        </p>
                    </div>
                </div>
            </a>
        ';
        }
        return $html_list_category;
    }

    function show_category_u($list_category)
    {
        $html_list_category = '';
        foreach ($list_category as $category) {
            $html_list_category .=
                '<a href="index.php?action=product_u&category_id=' . $category['category_id'] . '">
                <div class="card">
                    <img src="' . $category['category_img'] . '">
                    <div class="card-body">
                        <h5 class="card-title">ĐẶC SẢN ĐÀ NẴNG </h5>
                        <p class="card-text">
                            ' . $category['category_name'] . '
                        </p>
                    </div>
                </div>
            </a>
        ';
        }
        return $html_list_category;
    }
}
?>