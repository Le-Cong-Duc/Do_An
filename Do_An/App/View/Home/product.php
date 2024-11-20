<?php include('header.php') ?>
<?php include('navbar.php') ?>

<?php
$show_product = new productModel;
$show_category = new catgoryModel;

$html_list_product = $show_product->show_product($data['list_product']);
$category = $data['list_category_id'];
$html_page_1 = $show_product->show_product($data['page_1']);
$html_page_2 = $show_product->show_product($data['page_2']);
$html_page_3 = $show_product->show_product($data['page_3']);
?>


<section class="banner">
    <img src="<?= $category['category_banner'] ?>" alt="" width="100%">
</section>

<section id="product">
    <div id="introduce">
        <h2>ĐẶC SẢN <div class="title"> ĐÀ NẴNG</div>
        </h2>
    </div>

    <div class="pro-container">
        <!-- <?= $html_list_product ?> -->
        <?=$html_page_1?>
    </div>

    <div class="phantrang">
        <a href="#page=1">1</a>
        <a href="#page=2">2</a>
        <a href="#page=3">3</a>
    </div>

</section>


<section id="banner">
    <img src="<?= $category['category_banner'] ?>" alt="" width="100%">
</section>


<?php include('footer.php') ?>

<script>
    var category_id = <?= isset($category['category_id']) ? $category['category_id'] : 0 ?>;
    var html_page_1 = <?= json_encode($html_page_1) ?>;
    var html_page_2 = <?= json_encode($html_page_2) ?>;
    var html_page_3 = <?= json_encode($html_page_3) ?>;

    $('.phantrang').on('click', 'a', function () {
        var page = $(this).text();
        var link = page.substring(0, page.length);
        if (link == 1) {
            $('.pro-container').html(html_page_1);
        }
        else if (link == 2) {
            $('.pro-container').html(html_page_2);
        } 
        else if (link == 3) {
            $('.pro-container').html(html_page_3);
        }

    });
</script>