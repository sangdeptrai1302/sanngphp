<?php

use App\Models\Category;
use App\Models\Product;


$argc_category = [
    ['status', '=', 1],
    ['parent_id', '=', '0']
];
$list_category = Category::where($argc_category)
    ->orderBy('sort_order', 'ASC')
    ->get();


?>


<section class="maincontent my-4">
    <div class="container">
        <?php foreach ($list_category as $row_cat) : ?>
            <?php
            $list_category_id = array();
            array_push($list_category_id, $row_cat->id);
            $argc_category = [
                ['status', '=', 1],
                ['parent_id', '=', $row_cat->id]
            ];
            $list_category1 = Category::where($argc_category)
                ->get();
            if (count($list_category1) > 0) {
                foreach ($list_category1 as $row_cat1) {
                    array_push($list_category_id, $row_cat1->id);
                    $argc_category = [
                        ['status', '=', 1],
                        ['parent_id', '=', $row_cat1->id]
                    ];
                    $list_category2 = Category::where($argc_category)
                        ->get();
                    if (count($list_category2) > 0) {
                        foreach ($list_category2 as $row_cat2) {
                            array_push($list_category_id, $row_cat2->id);
                            $argc_category = [
                                ['status', '=', 1],
                                ['parent_id', '=', $row_cat2->id]
                            ];
                            $list_category3 = Category::where($argc_category)
                                ->get();
                            if (count($list_category3) > 0) {
                                foreach ($list_category3 as $row_cat3->id) {
                                    array_push($list_category_id, $row_cat3->id);
                                }
                            }
                        }
                    }
                }
            }
            // var_dump($list_category_id);
            $product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
                ->orderBy('created_at', 'DESC')
                ->take(6)
                ->get();
            ?>



            <div class="product-category my-3">
                <h3 class="text-category text-center text-uppercase text-color">
                    <a href="index.php?option=product&cat=<?= $row_cat->slug; ?>">
                        <?= $row_cat->name; ?>
                    </a>
                </h3>

                <div class="row">
    <?php foreach ($product_list as $product) : ?>
        <div class="col-md-4">
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
                        <div class="col-4">
                            <strong><?= number_format($product->pricesale); ?>đ</strong>
                        </div>
                        <div class="col-4 text">
                            <del><?= number_format($product->price); ?>đ</del>
                        </div>
                        <div class="col-4 text">
                            <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




            </div>
            <!--end product-category-->
        <?php endforeach; ?>
    </div>
</section>
