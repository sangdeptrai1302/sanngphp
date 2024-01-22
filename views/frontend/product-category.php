<?php
use App\Models\Product;
use App\Models\Category;
use App\Libraries\Phantrang;

$slug = $_REQUEST['cat'];
$row_category = Category::where([['slug','=', $slug],['status','=', 1]])->first();

$list_catid = array(); //khai bao mang rong
array_push($list_catid, $row_category->id);
$list_category1 = Category::where([['status','=', 1],['parent_id','=', $row_category->id]])
->get();
if(count($list_category1) > 0)
{
    foreach($list_category1 as $category1)
    {
        array_push($list_catid, $category1->id);
        $list_category2 = Category::where([['status','=', 1],['parent_id','=', $category1->id]])
        ->get();
        if(count($list_category2) > 0)
        {
            foreach($list_category2 as $category2)
            {
                array_push($list_catid, $category2->id);
            }
        }
    }
}
$title = $row_category->name;
$page = Phantrang::pageCurrent();
$limit = 8;
$skip = Phantrang::pageOffset($page, $limit);
$list_product = Product::where('status','=', 1)
->whereIn('category_id', $list_catid)
->orderBy('created_at', 'DESC')
->skip($skip)
->take($limit)
->get();
$total = Product::where('status', '=', 1)
->whereIn('category_id', $list_catid)
->count();// lấy ra số mẫu
$strLink = Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product&cat=');
?>

    <?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('views/frontend/mod-listcategory.php'); ?>
                <?php require_once('views/frontend/mod-listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h3 class="text-center text-dark"><?= $row_category->name;?></h3>
                <div class="row">
                    <?php foreach($list_product as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?option=product&slug=<?=$product->slug; ?>" title='<?=$product->name; ?>'>
                                    <img class="img-fluid w-100" src="public/dist/images/product/<?=$product->image; ?>"/>
                                </a>
                            </div>
                            <div className="product-name">
                                <a href="index.php?option=product&slug=<?=$product->slug;?>" title='<?=$product->name; ?>'>
                                    <a><?=$product->name; ?></a>
                                </a>
                            </div>
                            <div className="product-price">
                                <div class="row">
                                    <div class="col-4">
                                        <strong><?=number_format($product->pricesale); ?>₫</strong>
                                    </div>
                                <div class="col-4">
                                        <del><?=number_format($product->price); ?>₫</del>
                                    </div>
                                    <div class="col-4 text">
                                            <a href="index.php?option=cart&addcat=<?=$product->id;?>" class="btn btn-sm btn-success"><i class="fa-solid fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-md-3 -->
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row py-4">
                    <div class="col-12">
                        <?=$strLink; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('views/frontend/footer.php'); ?>