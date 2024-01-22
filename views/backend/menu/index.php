<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Topic;
use App\Models\Post;

$list_menu = Menu::where('status', '!=', 0)
  ->orderBy('position', 'asc')
  ->orderBy('sort_order', 'asc')
  ->get();

$list_category = Category::where('status', '!=', 0)
  ->orderBy('created_at', 'desc')
  ->get();

$list_brand = Brand::where('status', '!=', 0)
  ->orderBy('created_at', 'desc')
  ->get();

$list_topic = Topic::where('status', '!=', 0)
  ->orderBy('created_at', 'desc')
  ->get();

$list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
  ->orderBy('created_at', 'desc')
  ->get();

?>
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
<?php require_once('../views/backend/Header.php'); ?>
<form action="index.php?option=menu&cat=process" method="post">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " style="justify-content: center;">
            <h1>Tất cả menu</h1>
          </div>
          <div class="col-sm-6">
            <div class="row float-right">
              <input type="submit" name="UPDATE_SORT_ORDER" value="Lưu sắp xếp" class="mr-1 px-1 btn btn-success">
              <a class="btn btn-danger mr-1 px-1" href="index.php?option=menu&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card-header">
        <button name="DELETE_ALL" type="submit" class="btn btn-sm btn-danger p-3 m-2" style="border-radius: 17%;">
          <i class="fas fa-trash"></i> Xóa nhiều tin
        </button>

      </div>
      <!-- Default box -->
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
          <?php include_once('../views/backend/message.php'); ?>

          <div class="row">
            <div class="col-md-3">
              <div class="accordion" id="accordionExample">
                <div class="card position">
                  <div class="card-body">
                    <label for="">Vị trí menu</label>
                    <select name="position" class="form-control">
                      <?php
                      $positions = [];
                      foreach ($list_menu as $menu) {
                        if (!in_array($menu->position, $positions)) {
                          echo '<option value="' . $menu->position . '">' . $menu->position . '</option>';
                          $positions[] = $menu->position;
                        }
                      }
                      ?>
                    </select>
                  </div>

                </div>

              </div>
              <div class="card">
                <div class="card-body" id="headingCategory">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                      Danh mục Sản Phẩm
                    </button>
                  </h2>
                </div>

                <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                  <div class="card-body">
                    <form action="index.php?option=menu&cat=process" method="post">
                      <?php foreach ($list_category as $category) : ?>
                        <div class="form-check">
                          <input name="categoryId[]" class="form-check-input" type="checkbox" value="<?= $category->id; ?>" id="categoryCheck<?= $category->id; ?>">
                          <label class="form-check-label" for="categoryCheck<?= $category->id; ?>">
                            <?= $category->name; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <div class="mb-3">
                        <input type="hidden" name="position" value="<?= $list_menu[0]->position ?? 1; ?>">
                        <input type="submit" name="themCategory" class="btn btn-success btn-sm form-control" value="Thêm Menu">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--end category -->
              <div class="card">
                <div class="card-header" id="headingBrand">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                      Thương hiệu
                    </button>
                  </h2>
                </div>
                <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php foreach ($list_brand as $brand) : ?>
                      <div class="form-check">
                        <input name="brandID[]" class="form-check-input" type="checkbox" value="<?= $brand->id; ?>" id="brandCheck">
                        <label class="form-check-label" for="brandCheck<?= $brand->id; ?>">
                          <?= $brand->name; ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                    <div class="mb-3">
                      <input type="submit" name="themBrand" class="btn btn-success btn-sm form-control" value="Thêm Menu">
                    </div>
                  </div>
                </div>
              </div>
              <!-- end brand -->
              <div class="card">
                <div class="card-header" id="headingTopic">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="false" aria-controls="collapseTopic">
                      chủ đề bài viết
                    </button>
                  </h2>
                </div>
                <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php foreach ($list_topic as $topic) : ?>
                      <div class="form-check">
                        <input name="topicID[]" class="form-check-input" type="checkbox" value="<?= $topic->id; ?>" id="topicCheck<?= $topic->id; ?>">
                        <label class="form-check-label" for="topicCheck<?= $topic->id; ?>">
                          <?= $topic->name; ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                    <div class="mb-3">
                      <button type="submit" name="themTopic" class="btn btn-success btn-sm form-control">Thêm Menu</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- end topic -->
              <div class="card">
                <div class="card-header" id="headingPage">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage">
                      trang đơn
                    </button>
                  </h2>
                </div>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php foreach ($list_page as $page) : ?>
                      <div class="form-check">
                        <input name="pageID[]" class="form-check-input" type="checkbox" value="<?= $page->id; ?>" id="pageCheck">
                        <label class="form-check-label" for="pageCheck<?= $page->slug; ?>">
                          <?= $page->title; ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                    <div class="mb-3">
                      <input type="submit" name="themPage" class="btn btn-success btn-sm form-control" value="Thêm Menu">
                    </div>
                  </div>
                </div>
              </div>

              <!-- end page -->
              <div class="card">
                <div class="card-header" id="headingCustom">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="false" aria-controls="collapseCustom">
                      tùy liên kết
                    </button>
                  </h2>
                </div>
                <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="">Liên kết</label>
                      <input type="text" name="link" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="">Tên menu</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                      <input type="submit" name="themCustom" class="btn btn-success btn-sm form-control" value="Thêm Menu">
                    </div>
                  </div>
                </div>
              </div>
              <!-- end custom -->
            </div>

            <div class="col-md-9">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Đường Dẫn</th>
                    <th>Loại</th>
                    <th>Sắp xếp</th>
                    <th>Ngày tạo</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_menu as $row) : ?>
                    <tr>
                      <td><input type="checkbox" name="checkId[]" value="<?= $row->id ?>"></td>
                      <td><?= $row['id'] ?></td>
                      <td>
                        <b><?= $row['name'] ?></b><br>
                        <?= $row['link'] ?>
                      </td>
                      <td><?= $row['position'] ?></td>
                      <td>
                        <input type="number" name="sort_order[<?= $row['id'] ?>]" value="<?= $row['sort_order'] ?>">
                      </td>
                      <td><?= $row['created_at'] ?></td>
                      <td>
                        <div class="container " style="align-items:center">
                          <?php if ($row->status == 1) : ?>
                            <button class="btn btn-sm btn-success p-3 m-2 toggle-btn" name="id" data-id="<?= $row->id ?>" style="border-radius: 17%" href="index.php?option=menu&cat=status&id=<?= $row->id ?>">
                              <i class="fas fa-toggle-on"></i>
                            </button>
                          <?php else : ?>
                            <button class="btn btn-sm btn-danger p-3 m-2 toggle-btn" name="id" data-id="<?= $row->id ?>" style="border-radius: 17%" href="index.php?option=menu&cat=status&id=<?= $row->id ?>">
                              <i class="fas fa-toggle-off"></i>
                            </button>
                          <?php endif; ?>
                          <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%" ; href="index.php?option=menu&cat=detail&id=<?= $row->id ?>">
                            <i class="fa-solid fa-circle-info"></i>
                          </a>

                          <a class="btn btn-sm btn-success p-3 m-2" style="border-radius: 17%" ; href="index.php?option=menu&cat=edit&id=<?= $row->id ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                          <a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%" ; href="index.php?option=menu&cat=delete&id=<?= $row->id ?>">
                            <i class="fas fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
<?php require_once('../views/backend/Footer.php'); ?>