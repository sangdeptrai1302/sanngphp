<?php
use App\Models\Product;
use App\Models\Category;
$slug=$_REQUEST['slug'];
$product=Product::where([['status','=',1],['slug','=',$slug]])
->first();
$title = $product->name;
$argc_category = [
    ['status', '=', 1],
    ['parent_id', '=', '0']
];
$list_category = Category::where($argc_category)
    ->orderBy('sort_order', 'ASC')
    ->get();

$list_category_id = array();
array_push($list_category_id, $product->category_id);

foreach ($list_category as $row_cat) {
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
                        foreach ($list_category3 as $row_cat3) {
                            array_push($list_category_id, $row_cat3->id);
                        }
                    }
                }
            }
        }
    }
}

$product_list = Product::where([
    ['status', '=', 1],
    ['id', '!=', $product->id]
])
    ->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'asc')
    ->take(4)
    ->get();
?>

<?php require_once('views/frontend/header.php'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="CHwgW5R6"></script>

<section class="container my-4">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img width="488" id="main-img" src="public/dist/images/product/<?=$product->image; ?>"/>
        </div>
        <div class="col-md-6">
            <h1 class="fs-2"><?=$product->name?></h1>
            <b class="fs-2"><?=$product->metadesc;?></b>
            <h2>Giá bán: <?=$product->price;?></h2>
            <input type="number" id="qty" value="1" min="1" class="form-control" style="width:90px">
            <a href="index.php?option=cart"><button onclick="AddCart(<?=$product->id;?>)" class="btn btn-success my-2" style="width:120px">Đặt hàng</button></a>
            
                <a href="index.php?option=cart&addcat=<?=$product->id;?>" class="btn btn-sm btn-success" style="width:120px">Thêm vào giỏ </a>
                <p>Thông tin sản phẩm
FORM DÁNG: Dáng vừa/ Regular Fit

THIẾT KẾ:
- Áo sơ mi dài tay phom Regular Fit suông nhẹ, phù hợp với mọi dáng người, 
- Áo thiết kế đơn giản với màu trắng kẻ xám đơn giản nhưng tinh tế, mang đến 
CHẤT LIỆU:
- 50% Bamboo từ sợi tre thiên nhiên mang đến sự thoáng mát, t
- 50% Polyspun giúp tiết kiệm tối đa thời gian cho chuyện là 

MÀU SẮC: Trắng kẻ xám
SIZE: 38/39/40/41/42/43</p>
        </div>
    </div>
    

    <div class="row my-4">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sản phẩm cùng loại</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane-info" type="button" role="tab" aria-controls="profile-tab-pane-info" aria-selected="true">Thông tin sản phẩm</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments-tab-pane" type="button" role="tab" aria-controls="comments-tab-pane" aria-selected="false">Bình luận</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="like-tab" data-bs-toggle="tab" data-bs-target="#like-tab-pane" type="button" role="tab" aria-controls="like-tab-pane" aria-selected="false">Like</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row">
                        <?php foreach ($product_list as $item) : ?>
                            <div class="col-md-3">
                                <div class="product-item mb-3">
                                    <a href="index.php?option=product&ca=<?= $item->category_id; ?>">
                                        <img class="img-fluid w-100" src="public/dist/images/product/<?= $item->image; ?>" alt="<?= $item->image; ?>" />
                                    </a>
                                    <h3 class="product-name fs-5">
                                        <a href="index.php?option=product&slug=<?= $item->slug; ?>">
                                            <?= $item->name; ?>
                                        </a>
                                    </h3>
                                    <div class="product-price">
                                        <div class="row">
                                            <div class="col-4">
                                                <strong><?= number_format($item->pricesale); ?>đ</strong>
                                            </div>
                                            <div class="col-4 text">
                                                <del><?= number_format($item->price); ?>đ</del>
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
                </div>
                          
                <div class="tab-pane fade" id="profile-tab-pane-info" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h1 class="strong"><?=$product->detail;?></h1>
                </div>

                <div class="tab-pane fade" id="comments-tab-pane" role="tabpanel" aria-labelledby="comments-tab" tabindex="0">
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="10"></div>
                </div>

                <div class="tab-pane fade" id="like-tab-pane" role="tabpanel" aria-labelledby="like-tab" tabindex="0">
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                </div>
            </div>

        </div>
    </div>
</div>

    

</section>
<script>
    function AddCart(productid)
    {
        var qty=document.querySelector('#qty').value
        alert(productid +" số lượng "+qty)
    }
</script>
<?php require_once('views/frontend/footer.php'); ?>