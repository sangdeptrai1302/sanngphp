
<?php
use App\Models\Menu;

$args_footer=[
['status','=',1],
['position','=','footermenu']
];
$list_menu_footer=Menu::where($args_footer)
->get();
?>



<h4 class="text-white">về chúng tôi</h4>
            <ul class="list-menu">
            <?php foreach($list_menu_footer as $list_menu_footer):?>
                <li class="li_menu"><a href="<?=$list_menu_footer->link;?>" title="trang chủ"><?=$list_menu_footer->name;?></a></li>
            <?php endforeach ; ?>
            </ul> 