<?php
use App\Models\Category;
use App\Libraries\MyClass;


$list=Category::where('status','!=','0')->get();
$list_cat=Category::all();
              
$id = $_REQUEST['id'];
$category = Category::find($id);




$html_parent_id='';
$html_sort_order='';
foreach($list_cat as $item){

    if($item->id == $category->parent_id){
        $html_parent_id.="<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    }else{
        $html_parent_id.="<option  value='" . $item->id . "'>" . $item->name . "</option>";
    }

if($item->sort_order == $category->sort_order -1){
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
            <h1 ><strong>Cập nhật sản phẩm </strong></h1> 
          </div> 
          <div class="col-lg-6 "> 
          <div class="row float-right"> 
              <a  class="btn btn-danger mr-1 px-1"  href="index.php?option=category"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 

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
     
  


<form action="index.php?option=category&cat=process&id=<?=$category->id;?>" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <div class="form-group"> 
          <label for="name">Tên sản phẩm:</label>
          <input type="name" value="<?=$category['name']?>" class="form-control" id="name" name="name" require placeholder="VD:Quần áo">
        </div>
        <div class="form-group">
          <label for="metadesc">Mô tả(SEO):</label>
          <textarea class="form-control" id="metadesc" name="metadesc" require placeholder="VD:Thời trang nam đẹp số dách, đẹp hơn Sơn Tùng, chấp tùng núi, chấp sếp 3 bước "><?=$category['metadesc']?></textarea>
        </div>
        <div class="form-group">
          <label for="metakey">Từ khóa(SEO):</label>
          <input type="text" class="form-control" value="<?=$category['metakey']?>" id="metakey" name="metakey" require placeholder="VD:Thời trang nam">
        </div>
        <div class="form-group">
          <label for="parent-id">Danh mục cha:</label>
          <select class="form-control" id="parent-id" name="parent_id">
            <option value="0">-- Chọn danh mục cha --</option>
            <?=$html_parent_id; ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="sort_order">Sau sản phẩm:</label>
          <select class="form-control" id="sort_order" name="sort_order">
            <option value="0">-- Chọn ID --</option>
            <?= $html_sort_order; ?>
          </select>
        </div>
                  <div class="form-group">
            <label for="image">Ảnh:</label>
            <div class="custom-file">
              <input value="<?=$category['image']?>"  type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Chọn tệp</label>
            </div>
            <script>
              $('.custom-file-input').on('change', function() {
                  var fileName = $(this).val().split('\\').pop();
                  $(this).next('.custom-file-label').addClass("selected").html(fileName);
              });
            </script>
          </div>
          <div class="form-group">
          <label  for="status">Trạng thái:</label>
          <select val class="form-control" id="status" name="status">
          <option value="1"<?php ($category->status==1)? 'selected': ''; ?>>Chưa bật</option>
          <option value="2"<?php ($category->status==2)? 'selected': ''; ?>>Đẫ bật</option>
          </select>
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12">
          <button name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
          <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%"; href="index.php?option=category&cat=detail&id=<?=$category['id'];?>"> 


<i class="fa-solid fa-circle-info"></i>

</a>

<a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%"; href="index.php?option=category&cat=delete&id=<?=$category['id'];?>"> 

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