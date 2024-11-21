
<section id="nav">
    <a href="#" class="logo">D&D</a>

    <input type="checkbox" id="menu-nav">
    <label class=" " for="menu-nav"><i class="ti-menu"></i></label>
    <nav class="navbar">
        <ul>
            <li> <a href="index.php?action=admin">Trang chủ</a></li>
            <li> <a href="index.php?action=category_a">Sản phẩm</a></li>
            <li> <a href="index.php?action=customer">Khách Hàng</a></li>
            <li> <a href="index.php?action=bill">Đơn hàng</a></li>
            <li>
                <?= $_SESSION['username'] ?> 
                <a href="index.php?action=sign_in">Dang xuat</a>
            </li>
        </ul>

    </nav>
</section>