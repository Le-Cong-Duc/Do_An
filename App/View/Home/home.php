<?php include('header.php') ?>
<?php include('navbar.php') ?>

<?php
$list_category = $data['list_category'];

$show_product = new productModel;
$html_list_product_1 = $show_product->show_product($data['list_product_1']);
$html_list_product_2 = $show_product->show_product($data['list_product_2']);
$html_list_product_3 = $show_product->show_product($data['list_product_3']);
$html_list_product_4 = $show_product->show_product($data['list_product_4']);

$html_page_1_1 = $show_product->show_product($data['page_1_1']);
$html_page_1_2 = $show_product->show_product($data['page_1_2']);
$html_page_2_1 = $show_product->show_product($data['page_2_1']);
$html_page_2_2 = $show_product->show_product($data['page_2_2']);
$html_page_3_1 = $show_product->show_product($data['page_3_1']);
$html_page_3_2 = $show_product->show_product($data['page_3_2']);
$html_page_4_1 = $show_product->show_product($data['page_4_1']);
$html_page_4_2 = $show_product->show_product($data['page_4_2']);

$html_most_product = $show_product->show_product($data['most_product']);
$html_most_product_2 = $show_product->show_product($data['most_product_2']);

?>

<div id="container">

    <section id="slider">
        <img src="Public/img/slide.jpg" class="img-fluid" alt="">
    </section>

    <div id="introduce">
        <h2>ĐẶC SẢN <div class="title"> ĐÀ NẴNG</div>
        </h2>
    </div>


    <section id="category">

        <?php foreach ($list_category as $category) : ?>
            <a href="#<?= $category['category_id'] ?>">
                <div class="card">
                    <img src="<?= $category['category_img'] ?>">
                    <div class="card-body">
                        <h5 class="card-title">ĐẶC SẢN ĐÀ NẴNG </h5>
                        <p class="card-text">
                            <?= $category['category_name'] ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </section>

    <section id="product">

        <hr>
        <h4 style="color: red;">Sản phẩm bán chạy </h4>
        <hr>
        <div style="background-color: yellow;" class="pro-container" id="most">
            <?= $html_most_product; ?>
        </div>
        <div class="phantrang">
            <a href="#most_1">1</a>
            <a href="#most_2">2</a>
        </div>

        <hr>
        <h4 id="1">Đặc sản bánh kẹo </h4>
        <hr>
        <div class="pro-container" id="product_1">
            <?= $html_page_1_1; ?>
        </div>
        <div class="phantrang">
            <a href="#1_1">1</a>
            <a href="#1_2">2</a>
            <a style="color: blue;" href="index.php?action=product&category_id=1" style="background-color: black; color: aliceblue;">More >></a>
        </div>

        <hr>
        <h4 id="2">Đặc sản khô </h4>
        <hr>
        <div class="pro-container" id="product_2">
            <?= $html_page_2_1; ?>
        </div>
        <div class="phantrang">
            <a href="#2_1">1</a>
            <a href="#2_2">2</a>
            <a style="color: blue;" href="index.php?action=product&category_id=2" style="background-color: black; color: aliceblue;">More >></a>
        </div>

        <hr>
        <h4 id="3">Đặc sản mắm </h4>
        <hr>
        <div class="pro-container" id="product_3">
            <?= $html_page_3_1; ?>
        </div>
        <div class="phantrang">
            <a href="#3_1">1</a>
            <a href="#3_2">2</a>
            <a style="color: blue;" href="index.php?action=product&category_id=3" style="background-color: black; color: aliceblue;">More >></a>
        </div>

        <hr>
        <h4 id="4">Đặc sản một nắng </h4>
        <hr>
        <div class="pro-container" id="product_4">
            <?= $html_page_4_1; ?>
        </div>
        <div class="phantrang">
            <a href="#4_1">1</a>
            <a href="#4_2">2</a>
            <a style="color: blue;" href="index.php?action=product&category_id=4" style="background-color: black; color: aliceblue;">More >></a>
        </div>

    </section>

    <div id="introduce">
        <h2>ĐẶC SẢN <div class="title"> ĐÀ NẴNG</div>
        </h2>

        <p> Kết thúc chuyến đi Đà Nẵng của mình, bạn đang muốn tìm những món quà nho nhỏ về làm quà? Quả là khó để mang
            về nhà những mì Quảng, bún mắm hay bánh xèo, nhưng hãy yên tâm vì thành phố biển xinh đẹp này vẫn còn rất
            nhiều món đặc sản khô Đà Nẵng mang đầy đủ hương vị đặc trưng nơi đây.
        </p>
    </div>

    <section class="intro-section">
        <h2 class="intro-title">
            <span>🎁</span> GIỚI THIỆU VỀ SHOP ĐẶC SẢN D&D
        </h2>
        <p>
            D&D là thương hiệu chuyên cung cấp các loại đặc sản Đà Nẵng làm quà cho du khách. Đây là một shop đặc sản bán online, mang lại cho quý khách nhiều trải nghiệm:
        </p>
        <div class="intro-highlights">
            <ul style="list-style-type:disc">
                <li>Mua nhanh, dễ chọn lựa, hình ảnh và giá cả rõ ràng, giá cạnh tranh với phương châm tối ưu chi phí.</li>
                <li>Sản phẩm chất lượng được tuyển chọn từ nhân viên mua hàng trên 7 năm kinh nghiệm thu mua cho nhà phân phối các mặt hàng đặc sản.</li>
                <li>Giao hàng nhanh và freeship đơn hàng* tại Đà Nẵng.</li>
            </ul>
        </div>
        <p style="padding:10px" class="sub-intro">
            Đây là một thương hiệu được rất nhiều khách sạn tại Đà Nẵng giới thiệu cho du khách như một kênh mua sắm các sản phẩm quà tặng Đà Nẵng uy tín, chất lượng, giá cả phải chăng và dịch vụ tốt nhất Đà Nẵng theo các tiêu chí: miễn phí giao hàng, miễn phí đóng gói, giao nhanh theo yêu cầu. Nếu bạn chưa biết mua quà Đà Nẵng ở đâu thì shop online D&D có lẽ là một lựa chọn phù hợp. Đây là một địa chỉ đáng tin cậy để bạn có thể tìm kiếm những món đặc sản độc đáo của vùng biển Đà Nẵng.
            </strong> </p>
    </section>

</div>

<?php include('footer.php') ?>

<script>
    var html_page_1_1 = <?= json_encode($html_page_1_1) ?>;
    var html_page_1_2 = <?= json_encode($html_page_1_2) ?>;
    var html_page_2_1 = <?= json_encode($html_page_2_1) ?>;
    var html_page_2_2 = <?= json_encode($html_page_2_2) ?>;
    var html_page_3_1 = <?= json_encode($html_page_3_1) ?>;
    var html_page_3_2 = <?= json_encode($html_page_3_2) ?>;
    var html_page_4_1 = <?= json_encode($html_page_4_1) ?>;
    var html_page_4_2 = <?= json_encode($html_page_4_2) ?>;
    var most_1 = <?= json_encode($html_most_product) ?>;
    var most_2 = <?= json_encode($html_most_product_2) ?>;


    $('.phantrang').on('click', 'a', function() {
        $(this).siblings().removeClass('act');
        $(this).addClass('act');
        var page = $(this).attr('href');
        var link = page.substring(1, page.length);
        if (link == '1_1') {
            $('#product_1').html(html_page_1_1);
        } else if (link == '1_2') {
            $('#product_1').html(html_page_1_2);
        } else if (link == '2_1') {
            $('#product_2').html(html_page_2_1);
        } else if (link == '2_2') {
            $('#product_2').html(html_page_2_2);
        } else if (link == '3_1') {
            $('#product_3').html(html_page_3_1);
        } else if (link == '3_2') {
            $('#product_3').html(html_page_3_2);
        } else if (link == '4_1') {
            $('#product_4').html(html_page_4_1);
        } else if (link == '4_2') {
            $('#product_4').html(html_page_4_2);
        } else if (link == 'most_1') {
            $('#most').html(most_1);
        } else if (link == 'most_2') {
            $('#most').html(most_2);
        }

    });
</script>