<?php
use App\Models\Product;
use App\Libraries\MyClass;


$list=Product::where('status','!=','0')->get();
$list_cat=Product::all();
              
$id = $_REQUEST['id'];
$product = Product::find($id);




$html_parent_id='';
$html_sort_order='';
foreach($list_cat as $item){

    if($item->id == $product->parent_id){
        $html_parent_id.="<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    }else{
        $html_parent_id.="<option  value='" . $item->id . "'>" . $item->name . "</option>";
    }

if($item->sort_order == $product->sort_order -1){
    $html_sort_order.="<option selected value='" . $item->sort_order+1 . "'>Sau:" . $item->name . "</option>";
}else{
    $html_sort_order.="<option value='" . $item->sort_order+1 . "'>Sau:" . $item->name . "</option>";
}
}


?>


<?php require_once('../views/backend/Header.php') ;?> 

  <div class="content-wrapper"> 
     <section class="content-header"> 
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-lg-6 d-flex justify-content-center"> 
            <h1 ><strong>Cập nhật Product </strong></h1> 
          </div> 
          <div class="col-lg-6 "> 
          <div class="row float-right"> 
              <a  class="btn btn-danger mr-1 px-1"  href="index.php?option=product"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 

          </div> 
        </div> 
      </div>
    </section> 
 
    <section class="content"> 
   
 
<div class="card"> 
  <div class="card-header"> 
 
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
     
  


<form action="index.php?option=product&cat=process&id=<?=$product->id;?>" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="VD: Thời trang nam">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" class="form-control" required placeholder="VD: chi tiết"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required placeholder="VD: Thời trang dành cho nam giới"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khóa(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required placeholder="VD: Thời trang,thời trang nam,thời trang dành cho nam"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select id="category_id" name="category_id" class="form-control"required>
                                    <option value="">--Chọn Danh mục--</option>
                                    <?= $html_category_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id">Thương hiệu</label>
                                <select id="brand_id" name="brand_id" class="form-control">
                                    <option value="">--Chọn Thương hiệu--</option>
                                    <?= $html_brand_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number" value="1" min="1" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input name="price" id="price" type="number" value="1000" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="pricesale">Giá sale</label>
                                <input name="pricesale" id="pricesale" type="number" value="1000" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                    <!-- <?= $html_sort_order; ?> -->
                                </select>
                            </div>
                        </div>
                        
                    </div>
          </div>
          <div class="row">
          <div class="col-md-12">
          <button name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
          <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%"; href="index.php?option=product&cat=detail&id=<?=$product['id'];?>"> <i class="fa-solid fa-circle-info"></i></a>

<a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%"; href="index.php?option=product&cat=delete&id=<?=$product['id'];?>"> 

    <i class="fas fa-trash"></i>

    </a>

          </div>
          </div>
          
          </div>
          </form>



   
    </table> 
  </div> 
</div> 
</section> 
</div> 
<?php require_once('../views/backend/Footer.php') ;?>