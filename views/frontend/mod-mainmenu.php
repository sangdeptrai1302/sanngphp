<?php
use App\Models\Menu;
$args=[
    ['status', '=',1],
    ['position','=','mainmenu'],
    ['parent_id','=',0]
];
$list_menu = Menu::where($args)
->orderBy('sort_order','ASC')
->get();
?>
<?php if(count($list_menu) > 0):?>
    <section class="mainmenu bg-main">
        <div class="">
            <nav class="navbar navbar-expand-lg " >
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto  mb-lg-0 ">
                        <?php foreach ($list_menu as $menu): ?>
                            <?php
                                $args1=[
                                    ['status', '=',1],
                                    ['position','=','mainmenu'],
                                    ['parent_id','=', $menu->id]
                                ];
                                $list_menu1 = Menu::where($args1)
                                ->orderBy('sort_order','ASC')
                                ->get();
                            ?>
                            <?php if(count($list_menu1) > 0):?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?=$menu->link; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?=$menu->name; ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($list_menu1 as $menu1): ?>
                                            <li><a class="dropdown-item" href="<?=$menu1->link; ?>"><?=$menu1->name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=$menu->link; ?>"><?=$menu->name; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <!-- end menu -->
<?php endif;?>