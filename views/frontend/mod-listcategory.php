<link rel="style" href="views/frontend/style.css">
<?php
use App\Models\Category;

$list_category1=Category::where([['parent_id','=','0'],['status','=','1']])
->orderBy('sort_order','asc')
->get();

?>


<div class="card" style="width: 15rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item text-bg-dark">Danh mục sản phẩm</li>
    <?php foreach($list_category1 as $row_cat1):?>
      <?php
          $list_category2=Category::where([['parent_id','=',$row_cat1['id']],['status','=','1']])      
          ->orderBy('sort_order','asc')
            ->get();
      ?>

    <li class="list-group-item" ><strong href="index.php?option=product&cat=<?=$row_cat1['slug'];?>"><?=$row_cat1['name'];?></strong>
        <?php if(count($list_category2)!=0):?>
          <ul class="sub">
            <?php foreach($list_category2 as $row_cat2):?>
              <li ><a  style="color:black ;" class="listcategory" href="index.php?option=product&cat=<?=$row_cat2['slug'];?>"><?=$row_cat2['name'];?></a></li>
                <?php endforeach;?>
          </ul>
          <?php endif;?>
  </li>
  <?php endforeach;?>
    <!-- <li class="list-group-item">A third item</li> -->
  </ul>
</div>