<?php

$product = new productModel;

if (isset($_POST['category_id'])) {
    $category = $_POST['category_id'];
} else {
    $category = 1;
}

if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$offset = ($page - 1) * 4;

// $this->data['page_1'] = $this->product->get_product_page($category, $offset);
// $this->data['page_2'] = $this->product->get_product_page($category, $offset);
// $this->data['page_3'] = $this->product->get_product_page($category, $offset);

// $this->View('page', $this->titePage, $this->data);
echo $product->get_product_page($category, $offset);

?>
