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

}
