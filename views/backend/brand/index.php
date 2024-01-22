<?php

use App\Models\Brand;
use App\Models\Category; 
$list = Brand::all(); 
// var_dump($list); 
?> 
 
 
 
<?php require_once('../views/backend/Header.php') ;?> 
 
  <!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 
     <!-- Content Header (Page header) --> 
     <section class="content-header"> 
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-sm-6"> 
            <h1>Tất cả thương hiệu </h1> 
          </div> 
          <div class="col-sm-6 ">
          <div class="row float-right">
            <a class="btn btn-success mr-1 px-1" href="index.php?option=brand&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
            <a class="btn btn-danger mr-1 px-1" href="index.php?option=brand&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a>
          </div>
        </div>
          <div class="col-sm-6"> 
            <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item"><a href="#">Home</a></li> 
              <li class="breadcrumb-item active">Blank Page</li> 
            </ol> 
          </div> 
        </div> 
      </div><!-- /.container-fluid --> 
    </section> 
 
    <!-- Main content --> 
    <section class="content"> 
   
 
<!-- Default box --> 
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
    <table class="table table-bordered table-hover table-striped"> 
        <thead> 
            <tr> 
                <th>#</th> 
                <th>Id</th> 
                <th>image</th> 
                <th>Quốc Gia</th> 
                <th>slug</th> 
                <th>Ngày tạo</th> 
                <th>chức năng</th> 

            </tr> 
        </thead> 
        <tbody> 
            <?php foreach($list as $row):?> 
            <tr> 
                <td> 
                    <input type="checkbox"> 
                </td> 
                <td><?=$row['id']?></td> 
                <td><img class="img-thumbnail" src="../public/dist/images/brand/<?php echo $row['image'] ?>" alt=""></td> 
                <td><?=$row['name']?></td> 
                <td><?=$row['slug']?></td> 
                <td><?=$row['created_at']?></td> 
                <td>
                  <div class="container " style="align-items:center">
                    <?php if ($row['status'] == 1) : ?>
                      <button class="btn btn-sm btn-success p-3 m-2 toggle-btn" name="id" data-id="<?= $row['id']; ?>" style="border-radius: 17%" href="index.php?option=brand&cat=status&id=<?= $row['id']; ?>">
                        <i class="fas fa-toggle-on"></i>
                      </button>
                    <?php else : ?>
                      <button class="btn btn-sm btn-danger p-3 m-2 toggle-btn" name="id" data-id="<?= $row['id']; ?>" style="border-radius: 17%" href="index.php?option=brand&cat=status&id=<?= $row['id']; ?>">
                        <i class="fas fa-toggle-off"></i>
                      </button>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%" ; href="index.php?option=brand&cat=detail&id=<?= $row['id']; ?>">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                    <a class="btn btn-sm btn-success p-3 m-2" style="border-radius: 17%" ; href="index.php?option=brand&cat=edit&id=<?= $row['id']; ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%" ; href="index.php?option=brand&cat=delete&id=<?= $row['id']; ?>">
                      <i class="fas fa-trash"></i>
                    </a>
                </td> 
            </tr> 
            <?php endforeach;?> 
        </tbody> 
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
<script>
  $(document).ready(function(){
    $('#myTable').DataTable();
  })
</script>