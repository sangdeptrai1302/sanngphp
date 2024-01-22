<?php

use App\Models\Post;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$page = Post::find($id);
?>
<?php require_once('../views/backend/Header.php'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6 d-flex justify-content-center">
          <h1><strong>Cập nhật Bài viết </strong></h1>
        </div>
        <div class="col-lg-6 ">
          <div class="row float-right">
            <a class="btn btn-danger mr-1 px-1" href="index.php?option=page"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>

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




          <form action="index.php?option=page&cat=process&id=<?= $page->id; ?>" method="post" enctype="multipart/form-data">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Tiêu đề bài viết:</label>
                    <input type="text" value="<?= $page['title'] ?>" class="form-control" id="title" name="title" placeholder="VD: Tiêu đề">
                  </div>

                  <div class="form-group">
                    <label for="metakey">Từ khóa (SEO):</label>
                    <input type="text" value="<?= $page['metakey'] ?>" class="form-control" id="metakey" name="metakey" placeholder="VD: Từ khóa">
                  </div>
                  <div class="form-group">
                    <label for="slug">Chi tiết bài viết:</label>
                    <input type="text" class="form-control" id="slug" name="detail" placeholder="VD: chủ đề bài viết của bạn">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1" <?= ($page['status'] == 1) ? 'selected' : '' ?>>Chưa bật</option>
                      <option value="2" <?= ($page['status'] == 2) ? 'selected' : '' ?>>Đã bật</option>
                    </select>
                  </div>
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
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <button name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
                  <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%" ; href="index.php?option=page&cat=detail&id=<?= $page['id']; ?>">


                    <i class="fa-solid fa-circle-info"></i>

                  </a>

                  <a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%" ; href="index.php?option=page&cat=delete&id=<?= $page['id']; ?>">

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
<?php require_once('../views/backend/Footer.php'); ?>