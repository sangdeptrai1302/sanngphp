<?php
use App\Models\Post;

$slug=$_REQUEST['slug'];
$row_post=Post::where( [ ['status','=',1],
['type','=','post'],
['slug','=',$slug]])->first();
$list_other=Post::where(  [['status','=',1],
['type','=','post'],
['slug','!=',$slug]])
->orderBy('created_at','desc')
->take(10)
->get();
$title=$row_post['title'];
?>

<?php require_once('views/frontend/header.php'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="CHwgW5R6"></script>
<section class="">
    <div class="container">
            <h1><?=$row_post->title;?></h1>
            <p><?=$row_post->detail;?></p>
            
    </div>
   
    
    <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row">
                       
                        <!--end col-mb-3-->
                    </div>
                </div>

                <div class="tab-pane fade" id="profile-tab-pane-info" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h1 class="strong"><?=$row_post->detail;?></h1>
                </div>

                <div class="tab-pane fade" id="comments-tab-pane" role="tabpanel" aria-labelledby="comments-tab" tabindex="0">
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="10"></div>
                </div>

                <div class="tab-pane fade" id="like-tab-pane" role="tabpanel" aria-labelledby="like-tab" tabindex="0">
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                </div>
            </div>
    
</section>


<?php require_once('views/frontend/footer.php'); ?>
