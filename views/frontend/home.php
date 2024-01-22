<?php

use App\Models\Category;
use App\Models\Product;
?>


<?php require_once('views/frontend/header.php'); ?>
<!--section mainmenu-->
<section class="sliders">
    <?php require_once('views/frontend/mod-slider.php'); ?>
    
</section>
<section class="lienhe">
<!-- <a href="index.php"><img src="public/images/logoa.png" alt="mess" width="150"></a> -->

</section>
<!--end sliders-->
<?php


?>

<?php

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    if (!empty($keyword)) {
      
        // Truy vấn cơ sở dữ liệu và hiển thị kết quả tìm kiếm
        $results = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $keyword . '%')
            ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
            ->get();

        if ($results->count() > 0) {
            $count = 0;
            echo '<div class="row justify-content-center">';
            foreach ($results as $product) {
?>

                <div class="col-md-3 py-4">
                    <div class="product-item mb-3">
                        <a href="index.php?option=product&slug=<?= $product->slug; ?>">
                            <img class="img-fluid w-100" src="public/dist/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" />
                        </a>
                        <h3 class="product-name fs-5">
                            <a href="index.php?option=product&slug=<?= $product->slug; ?>">
                                <?= $product->name; ?>
                            </a>
                        </h3>
                        <div class="product-price">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <strong><?= number_format($product->pricesale); ?>đ</strong>
                                </div>
                                <div class="col-6 text-center">
                                    <del><?= number_format($product->price); ?>đ</del>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
                $count++;
                if ($count % 4 === 0) {
                    echo '</div><div class="row justify-content-center">';
                }
            }
            echo '</div>';
        } else {
            echo "Không tìm thấy kết quả cho từ khóa \"$keyword\".";
        }
    } else {
        require_once('views/frontend/search.php');
    }
} else {
    require_once('views/frontend/search.php');
}
?>
<?php if (!isset($_POST['keyword'])): ?>
<section class="categories my-5 text-center">
    <div class="container">

        <h4 class="text-center my-5">SẢN PHẨM MỚI NHẤT</h4>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $totalProducts = count($product_list);
                $counter = 0;

                for ($i = 0; $i < $totalProducts; $i += 6) {
                    echo '<div class="carousel-item' . ($counter === 0 ? ' active' : '') . '">';
                    echo '<div class="d-flex justify-content-between">';
                    for ($j = 0; $j < 6 && $i + $j < $totalProducts; $j++) {
                        $product = $product_list[$i + $j];
                        ?>
                        <div class="col-md-2">
                            <a href="index.php?option=product&id=<?= $product->created_at; ?>">
                                <img class="img-fluid product-image" src="public/dist/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" />
                                <h3 class="product-name fs-6">
                                    
                                </h3>
                               
                            </a>
                        </div>
                        <?php
                    }
                    echo '</div>';
                    echo '</div>';
                    $counter++;
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>
<?php require_once('views/frontend/mod-lastnew.php'); ?>

<?php require_once('views/frontend/footer.php'); ?>