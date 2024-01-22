<?php

use App\Libraries\MyClass;
use App\Models\Brand;
use App\Models\Category;






$list = Category::where('status', '!=', '0')->orderBy('created_at', 'DESC')->get();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;

?>

<?php require_once('../views/backend/Header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // bắt sự kiện click vào nút toggle
    $('.toggle-btn').click(function(e) {
      e.preventDefault();
      var id = $(this).data('id'); // lấy id của category
      var url = $(this).attr('href'); // lấy url của request
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            // nếu update thành công thì cập nhật trạng thái của toggle
            $('.toggle-btn[data-id="' + id + '"]').toggleClass('btn-success btn-danger');
            $('.toggle-btn[data-id="' + id + '"] i').toggleClass('fa-toggle-on fa-toggle-off');
            // hiển thị message
            $('.message').html('<div class="alert alert-' + response.type + '">' + response.msg + '</div>');
          } else {
            // nếu có lỗi thì hiển thị message
            $('.message').html('<div class="alert alert-' + response.type + '">' + response.msg + '</div>');
          }
        }
      });
    });
  });
</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 " style="justify-content: center;">
          <h1>Tất cả sản phẩm </h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a class="btn btn-success mr-1 px-1" href="index.php?option=category&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
            <a class="btn btn-danger mr-1 px-1" href="index.php?option=category&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger text-center fs-5" style="font-size: x-large;">
      <?= $_SESSION['error'] ?>
    </div>
    <?php unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị 
    ?>
  <?php endif; ?>


  <!-- Default box -->

  <div class="card">
    <div class="card-header">



      <form method="post" action="index.php?option=category&cat=delete">

        <button name="DELETE_ALL" type="submit" class="btn btn-sm btn-danger p-3 m-2" style="border-radius: 17%;">
          <i class="fas fa-trash"></i> Xóa nhiều tin
        </button>
        
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
      <?php require_once('../views/backend/message.php'); ?>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th style='width:90px;' class="text-center">image</th>
            <th>Tên</th>
            <th>Slug (SEO)</th>
            <th>Mô tả (SEO)</th>
            <th>Ngày tạo</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $row) : ?>
            <tr>
              <td><input type="checkbox" name="checkId[]" value="<?= $row->id ?>"></td>
              <td><?= $row->id ?></td>
              <td><img class="img-thumbnail" src="../public/dist/images/category/<?php echo $row['image'] ?>" alt=""></td> 
              <td><?= $row->name ?></td>
              <td><?= $row->slug ?></td>
              <td><?= $row->metadesc ?></td>
              <td><?= $row->created_at ?></td>
              <td>
                <div class="container " style="align-items:center">
                  <?php if ($row->status == 1) : ?>
                    <button class="btn btn-sm btn-success p-3 m-2 toggle-btn" name="id" data-id="<?= $row->id ?>" style="border-radius: 17%" href="index.php?option=category&cat=status&id=<?= $row->id ?>">
                      <i class="fas fa-toggle-on"></i>
                    </button>
                  <?php else : ?>
                    <button class="btn btn-sm btn-danger p-3 m-2 toggle-btn" name="id" data-id="<?= $row->id ?>" style="border-radius: 17%" href="index.php?option=category&cat=status&id=<?= $row->id ?>">
                      <i class="fas fa-toggle-off"></i>
                    </button>
                  <?php endif; ?>
                  <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%" ; href="index.php?option=category&cat=detail&id=<?= $row->id ?>">
                    <i class="fa-solid fa-circle-info"></i>
                  </a>

                  <a class="btn btn-sm btn-success p-3 m-2" style="border-radius: 17%" ; href="index.php?option=category&cat=edit&id=<?= $row->id ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%" ; href="index.php?option=category&cat=delete&id=<?= $row->id ?>">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      </form>


    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/Footer.php'); ?>