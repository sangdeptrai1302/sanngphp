<?php

use App\Libraries\MessageArt;
use App\Models\Brand;
use App\Libraries\MyClass;
use App\Models\Product;


$list = Product::where('status','!=','0')->orderBy('created_at','DESC')->get();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;
$id = $_REQUEST['id'];
$product = Product::find($id);
if($product==null)
{
  MyClass::set_flash('MessageArt',['type'=>'danger','msg'=>'mấu tin không tồn tại']);
  header("location:index.php?option=product");
}
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
            <h1 >Chi tiết Product </h1> 
          </div> 
          <div class="col-sm-6 "> 
            <div class="row float-right"> 
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=product"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 
              <a class="btn btn-success mr-1 px-1"  href="index.php?option=product&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=product&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a> 
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
                        <img class="img-thumbnail" src="../public/dist/images/product/<?php echo $product['image'] ?>" alt="hình ảnh">
                        </div>
                        <div class="col-md-7">
                        <h2>Tên sản phẩm:<?=$product['name']?></h2>
                        <p><strong>ID sản phẩm: <?=$product['id']?></strong></p>
                        <p><strong>Slug:<?=$product['price']?></strong></p>
                        <p><strong>Mã cấp cha:<?=$product['price']?></strong></p>
                        <p><strong>Từ khóa (SEO):<?=$product['price']?></strong></p>
                        <p><strong>Ngày tạo:<?=$product['created_at']?></strong></p>
                        <p><strong>Người tạo:<?=$product['created_by']?></strong></p>
                        <p><strong>Ngày sửa cuối:<?=$product['updated_at']?></strong></p>
                        <p><strong>Người sửa cuối:<?=$product['updated_by']?></strong></p>
                        <p><strong>Trạng thái:<?=$product['status']?></strong></p>
                        <h3><strong>Mô tả sản phẩm:</strong><?=$product['metadesc']?></h3>
                        
                    
                    <a class="btn btn-sm btn-success p-3 m-2  justify-content-center" style="border-radius: 17%"; href="index.php?option=product&cat=edit&id=<?=$product['id'];?>"> 
                              <i class="fa-solid fa-pen-to-square"></i>
                                  </a>
                    <a class="btn btn-sm btn-danger  p-3 m-2  justify-content-center" style="border-radius: 17%"; href="index.php?option=product&cat=delete&id=<?=$product['id'];?>"> 
                                  <i class="fas fa-trash"></i>
                                  </a>
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