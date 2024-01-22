<?php 
use App\Models\Contact;
$title='Liên hệ';
$message = '';

if (isset($_POST['GUI']))
{
    $contact=new Contact();
    $contact->name =$_POST['name']??null;
    $contact->email=$_POST['email'];
    $contact->phone=$_POST['phone'];
    $contact->title=$_POST['title'];
    $contact->detail=$_POST['detail'];
    $contact->status= 1;
    $contact->save();

}
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="container" >
    <<div class="card-body">
        <table class="table table-bordered table-hover table-striped">
          
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Tên người liên hệ</label>
                    <input type="text" class="form-control" id="slug" name="name" placeholder="VD: Lê Văn Sáng">
                  </div>
                  <div class="form-group">
                    <label for="email">nhập email liên hệ</label>
                    <input type="text" class="form-control" id="slug" name="email" placeholder="VD: sangdeptrai@gmail.com">
                  </div>
                  <div class="form-group">
                    <label for="phone">nhập số điện thoại liên hệ</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="VD: 012345678">
                  </div>
                  <div class="form-group">
                    <label for="title">nhập chủ đề liên hệ</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="VD: sản phẩm rất đẹp">
                  </div>
                  <div class="form-group">
                    <label for="detail">nhập chi tiết liên hệ</label>
                    <input type="text" class="form-control" id="detail" name="detail" placeholder="VD: sản phẩm rất đẹp">
                  </div>

                </div>
                <div class="col-md-6"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15553.925930115105!2d10
                            8.2496147!3d12.9410129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1679771318750!5m2!1svi!2s" width="600" 
                            height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>     
              <div class="row">
                <div class="col-md-12">
                  <button name="THEM" type="submit" class="btn btn-success text-center"> GỬI LIÊN HỆ</button>
                  <?php if (!empty($message)): ?>
  <div class="alert alert-success"><?php echo $message; ?></div>
<?php endif; ?>
                </div>
              </div>
            </div>
          </form>




        </table>
      </div>
      
      

</section>
<?php require_once('views/frontend/footer.php'); ?>