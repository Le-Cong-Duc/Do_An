<?php
session_start();
$category = new catgoryModel;

$html_list_category = '';
$list_category = $category->get_all_category();

foreach ($list_category as $category) {
    $html_list_category .=
        '
        <li><a href="index.php?action=product_u&category_id= ' . $category['category_id'] . '">
        ' . $category['category_name'] . '
        </a></li>
        <hr>
        ';
}
?>
<section id="nav">
    <a href="#" class="logo">D&D</a>

    <input type="checkbox" id="menu-nav">
    <label class=" " for="menu-nav"><i class="ti-menu"></i></label>
    <nav class="navbar">
        <ul>
            <li> <a href="index.php?action=user">Trang Chủ</a></li>
            <li> <a href="#">Sản Phẩm</a>
                <ul>
                    <?= $html_list_category ?>
                </ul>
            </li>
            <li> <a href="index.php?action=cart_u"><i class="shop-icon ti-shopping-cart"></i></a></li>
            <li>
                <form action="index.php?action=search_u" method="post" class="d-flex search">
                    <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <button class="btn btn-outline-success me-2" name="btn_search" type="submit">
                        <i class="ti-search"></i>
                    </button>
                </form>
            </li>
            <li>
                Chào mừng ,
                <?= $_SESSION['username'] ?>
                <a href="/Do_An/index.php?action=sign_in">Dang xuat</a>
            </li>
        </ul>

    </nav>
</section>