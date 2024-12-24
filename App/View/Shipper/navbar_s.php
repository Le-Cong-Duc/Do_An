<section id="nav">
    <a href="#" class="logo">D&D</a>

    <input type="checkbox" id="menu-nav">
    <label class=" " for="menu-nav"><i class="ti-menu"></i></label>
    <nav class="navbar">
        <ul>
            <li>
                <a style="color: blue;"><?= $_SESSION['username'] ?><i class="ti-truck"></i></a>
            </li>
            <li>
                <a href="index.php?action=sign_in"><i class="ti-share" style="font-weight: bolder;"></i></a>
            </li>
        </ul>

    </nav>
</section>