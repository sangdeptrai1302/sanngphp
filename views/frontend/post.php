



<?php

use App\Models\Post;
use App\Libraries\Myclass;
use App\Libraries\Phantrang;

$page = Phantrang::pageCurrent();
$limit = 2;
$skip = Phantrang::pageOffset($page, $limit);

$list_post = Post::where([['status','=',1],['type','=','post']])
->orderBy('created_at', 'DESC')
->skip($skip)
->take($limit)
->get();
$total = Post::where([['status','=',1],['type','=','post']])->count();// lấy ra số mẫu
$strLink = Phantrang::pageLinks($total, $page, $limit, 'index.php?option=post');
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
        <h3 class="text-center">Tất cả bài viết</h3>
        <?php foreach($list_post as $post): ?>
        <div class="row mb-4">
            <div class="col-md-4">
                <a href="index.php?option=post&slug=<?=$post->slug; ?>" title='<?=$post->title; ?>'>
                    <img class="img-fluid w-100" src="public/dist/images/product/<?=$post->image; ?>"/>
                </a>
            </div>
            <div class="col-md-8">
                <h3>
                    <a href="index.php?option=post&slug=<?=$post->slug; ?>" title='<?=$post->title; ?>'>
                        <?=$post->title; ?>
                    </a>
                </h3>
                <p>
                    <?=Myclass::word_limit($post->detail, 1);?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
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
