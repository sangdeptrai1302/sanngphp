<?php

use App\Models\Brand;
use App\Models\Product;

$list = Brand::where('status','!=','0')->orderBy('created_at','DESC')->get();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;
$id = $_REQUEST['id'];
$brand = Brand::find($id);
?> 
<?php require_once('../views/backend/Header.php') ;?> 
  <!-- Content Wrapper. Contains page content --> 

  <div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 
     <!-- Content Header (Page header) --> 
     <section class="content-header"> 
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-sm-6 " style="justify-content: center;"> 
            <h1 >Chi tiết thương hiệu </h1> 
          </div> 
          <div class="col-sm-6 "> 
            <div class="row float-right"> 
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=brand"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 
              <a class="btn btn-success mr-1 px-1"  href="index.php?option=brand&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=brand&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a> 
            </div> 
          </div> 
        </div> 
      </div><!-- /.container-fluid --> 
    </section> 
 
    <!-- Main content --> 
    <section class="content"> 
   
 
<!-- Default box --> 
<div class="card"> 
  <div class="card-header"> 
    <h3 class="card-title"></h3> 
 
    <div class="card-tools"> 
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> 
        <i class="fas fa-minus"></i> 
      </button> 
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> 
        <i class="fas fa-times"></i> 
      </button> 
    </div> 
  </div> 
  <div class="card-body"> 
    <table class="table table-bordered table-hover table-striped"> 
        
  
                        <div class="container my-5">
                        <div class="row">
                        <div class="col-md-5">
                        <img class="img-fluid" src="../public/dist/images/brand/<?php echo $brand['image'] ?>" alt=""></div>
                        <div class="col-md-7">
                        <h2>Tên thương hiệu:<?=$brand['name']?></h2>
                        <p><strong>ID sản phẩm: <?=$brand['id']?></strong></p>
                        <p><strong>Slug:<?=$brand['price']?></strong></p>
                        <p><strong>Mã cấp cha:<?=$brand['price']?></strong></p>
                        <p><strong>Từ khóa (SEO):<?=$brand['price']?></strong></p>
                        <p><strong>Ngày tạo:<?=$brand['created_at']?></strong></p>
                        <p><strong>Người tạo:<?=$brand['created_by']?></strong></p>
                        <p><strong>Ngày sửa cuối:<?=$brand['updated_at']?></strong></p>
                        <p><strong>Người sửa cuối:<?=$brand['updated_by']?></strong></p>
                        <p><strong>Trạng thái:<?=$brand['status']?></strong></p>
                        <h3><strong>Mô tả sản phẩm:</strong><?=$brand['metadesc']?></h3>
                        
                    
                    <a class="btn btn-sm btn-success p-3 m-2  justify-content-center" style="border-radius: 17%"; href="index.php?option=brand&cat=edit&id=<?=$brand['id'];?>"> 
                              <i class="fa-solid fa-pen-to-square"></i>
                                  </a>
                    <a class="btn btn-sm btn-danger  p-3 m-2  justify-content-center" style="border-radius: 17%"; href="index.php?option=brand&cat=delete&id=<?=$brand['id'];?>"> 
                                  <i class="fas fa-trash"></i>
                                  </a>
                                  </div>
                                  </div>
                    </div>

    </table> 
  
  </div> 
  <!-- /.card-body --> 
  
  <!-- /.card-footer--> 
</div> 
<!-- /.card --> 
 
</section> 
<!-- /.content --> 
</div> 
<!-- /.content-wrapper --> 
 
<?php require_once('../views/backend/Footer.php') ;?>