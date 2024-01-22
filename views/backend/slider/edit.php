<?php
use App\Models\Slider;
$id =$_REQUEST['id'];
$row=Slider::find($id);
$list = Slider::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    if($item->id==$row->parent_id)
    {
        $html_parent_id .= "<option selected value'" . $item->id . "'>" . $item->name . "</option>";
    }
    else
    {
        $html_parent_id .= "<option value'" . $item->id . "'>" . $item->name . "</option>";
    }
    if($item->sort_order==$row->sort_order)
    {
        $html_sort_order .= "<option selected value'" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
    }
    else
    {
        $html_sort_order .= "<option value'" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
    }
}
?>
<?php require_once '../views/backend/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">CẬP NHẬT DANH MỤC</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật danh mục</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

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
                    <div class="row">
                        <div class="col-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn-btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=slider">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
        <table class="table table-bordered table-hover table-striped">


         
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="slug">tên slider</label>
                    <input type="text" class="form-control" id="slug" name="name" placeholder="VD: san phẩm đẹp nhất">
                  </div>

                  <div class="form-group">
                    <label for="link">liên kết</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="">
                  </div>
                  <div class="form-group">
          <label for="position">vị trí:</label>
          <select class="form-control" id="id" name="position">
            <option value="">-- Chọn ID --</option>
            <?php
               foreach ($list_slider as $item) {
                echo '<option value="' . $item->sort_order+1 . '">Sau:' . $item['name'] . '</option>';
              }
            ?>2
          </select>
        </div>
        <div class="form-group">
          <label for="parent-id">sắp xếp:</label>
          <select class="form-control" id="sort_order" name="sort_order">
            <option value="0">-- chọn vị trí sắp xếp--</option>
            <?php
            
              foreach ($list_slider as $item) {
                echo '<option value="' . $item['id'] . '">' . $item['id'] . '</option>';
              }
            ?>
          </select>
        </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="image">Ảnh:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Chọn ảnh</label>
                    </div>
                    <script>
                      $('.custom-file-input').on('change', function() {
                        var fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                      });
                    </script>
                  </div>
                  <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1">Đã bật</option>
                      <option value="2">Chưa bật</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button name="THEM" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                </div>
              </div>
            </div>
          




        </table>
     
</form>
<?php require_once '../views/backend/footer.php'; ?>