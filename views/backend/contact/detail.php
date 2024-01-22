<?php

use App\Libraries\MyClass;
use App\Models\Contact;


// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;

$id = $_REQUEST['id'];
$contact = Contact::find($id);
if($contact==null)
{
  MyClass::set_flash('message',['type'=>'danger','msg'=>'mẫu tin không tồn tại']);
  header('location:index.php?option=contact');
}
?>
<?php require_once('../views/backend/Header.php'); ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 " style="justify-content: center;">
          <h1>Chi tiết người liên hệ</h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=slider"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>
            <a class="btn btn-success mr-1 px-1" href="index.php?option=slider&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=slider&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a>
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
              
              </div>
              <div class="col-md-7">
                <h2>Tên người liên hệ:<?= $contact['name'] ?></h2>
                <p><strong>ID người liên hệ: <?= $contact['id'] ?></strong></p>
                <p><strong>email:<?= $contact['slug'] ?></strong></p>
                
                <p><strong>số điện thoại:<?= $contact['phone'] ?></strong></p>
                <p><strong>tiêu đề:<?= $contact['title'] ?></strong></p>
                <p><strong>chi tiết:<?= $contact['detail'] ?></strong></p>
                <p><strong>nội dung liên hệ:<?= $contact['replaydetail'] ?></strong></p>
                <p><strong>ngày liên hệ:<?= $contact['created_at'] ?></strong></p>
                <p><strong>ngày trả lời liên hệ:<?= $contact['created_at'] ?></strong></p>
                <p><strong>Trạng thái:<?= $contact['status'] ?></strong></p>
                



                <a class="btn btn-sm btn-success p-3 m-2  justify-content-center" style="border-radius: 17%" ; href="index.php?option=contact&cat=edit&id=<?= $contact['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="btn btn-sm btn-danger  p-3 m-2  justify-content-center" style="border-radius: 17%" ; href="index.php?option=contact&cat=delete&id=<?= $contact['id']; ?>">
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

<?php require_once('../views/backend/Footer.php'); ?>