


<?php
use App\Models\User;
if (isset($_POST['DANGNHAP']))
{
    $message_alert='';
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $args=null;
   
    if(filter_var($username, FILTER_VALIDATE_EMAIL))
    {
        $args=[
            ['email','=',$username],
            ['password','=',$password],
            ['status','=',1],
        ];
    }else
    {
        $args=[
            ['username','=',$username],
            ['password','=',$password],
            ['status','=',1],
        ];
    }
    $user=User::where($args)->first();
    if($user!=null)
{
    $_SESSION['logincustomer']=$username;
    $_SESSION['user_id']=$user->id;
    $message_alert="Đăng nhập thành công";
}else{
    $message_alert="Tài khoản không chính xác";
}
}


?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <form action="index.php?option=customer&f=login" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <?php require_once('views/frontend/account.php')?>
                </div>
                <div class="col-md-6">
                    <h3>ĐĂNG NHẬP KHÁCH HÀNG</h3>
                    <?php if(!isset($_SESSION['logincustomer'])):?>
                    <div class="mb-3">
                        <label for="username">Tên Đăng Nhập</label>
                        <input type="text" required name="username" id="username" 
                        placeholder="Tên đăng nhập hoặc email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" required name="password" id="password" 
                        placeholder="nhập mật khẩu" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="DANGNHAP" class="btn btn-success" value="Đăng Nhập">
                    </div>
                    <?php else:?>
                        <div class="mb-3">
                        <div class="alert alert-info">
                            Bạn đã đăng nhập
                        </div>
                    </div>
                    <?php endif ;?>
                    <?php if (isset($message_alert)):?>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <?=$message_alert;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                
            </div>
        </div>
    </form>

</section>


<?php require_once('views/frontend/footer.php'); ?>
