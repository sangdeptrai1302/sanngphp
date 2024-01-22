<?php

use App\Models\Product;
use App\Libraries\Phantrang;

$page=Phantrang::pageCurrent();
$limit=6;
$skip=Phantrang::pageOffset($page,$limit);

$product_list=Product::where('status','=',1)
->orderBy('created_at','DESC')
->skip($skip)
->take($limit)
->get();

$total = Product::where('status','=',1)->count();
$pageNumber =ceil($total / $limit);
$strLink=Phantrang::pageLinks($total,$page,$limit,'index.php?option=product');


?>
<?php require_once('views/frontend/header.php'); ?>


<section class="maincontent my-4">
     <div class="container">
            <div class="row">
                <div class="col-md-3 " >
                    <?php require_once('views/frontend/mod-listcategory.php'); ?>
                    <?php require_once('views/frontend/mod-listbrand.php'); ?>

                </div>
                <div class="col-md-9 ">
                    <h3 class="text-center text-bg-success">TẤT CẢ SẢN PHẨM</h3>
                    <div class="row">
                    <?php foreach ($product_list as $product) : ?>
                        <div class="col-md-4">
                            <div class="product-item mb-3">
                            <a href="index.php?option=product&slug=<?= $product->slug; ?>"> <img class="img-fluid w-100" src="public/dist/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" />
                                </a>
                                <h3 class="product-name fs-6">
                                    <a href="index.php?option=product&slug=<?= $product->slug; ?>">
                                        <?= $product->name; ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <div class="row">
                                        <div class="col-4">
                                            <a><?= number_format($product->pricesale); ?>đ</a>
                                        </div>
                                        <div class="col-4 text">
                                            <del><?= number_format($product->price); ?>đ</del>
                                        </div>
                                        <div class="col-4 text">
                                            <a href="index.php?option=cart&addcat=<?=$product->id;?>" class="btn btn-sm btn-success"><i class="fa-solid fa-cart-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!--end col-mb-3-->
                </div>
                <div class="row py-4">
                <div class="col-md-12 ">
                    <?=$strLink;?>
                </div>
            </div>
                </div>
                
            </div>
            
     </div>

</section>
<?php require_once('views/frontend/footer.php'); ?>