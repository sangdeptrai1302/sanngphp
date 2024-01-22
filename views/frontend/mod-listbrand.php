<?php
use App\Models\Brand;
$list_brand=Brand::Where('status','=','1')->get();
?>

<div class="card" style="width: 15rem;">
  <ul class="list-group list-group-flush">
  <li class="list-group-item text-bg-dark">THƯƠNG HIỆU</li>
    <?php foreach($list_brand as $brand) :?>
        <li class="list-group-item">
          <a style="color:black" href="index.php?option=brand&cat=<?=$brand->slug;?>">
          <?=$brand->name;?>
        </a>
        </li>
       <?php endforeach;?>
  </ul>
</div>
