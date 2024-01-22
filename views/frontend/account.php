<?php
use App\Models\User;
$list = User::where([['status', '!=', '0'],['roles','=','1']])->orderBy('created_at', 'DESC')->get();
?>
<div class="taikhoan">
    <div class="row">
        <div class="col-md-">
                <h2>Tên đăng nhâp ;Admin</h2>
                <p><strong> email:admin@gmail.com </strong></p>
                <p><strong>  phone:0345313382</strong></p>
                <p><strong>  </strong></p>
                <p><strong>  </strong></p>
                <p><strong>  </strong></p>
                <p><strong>  </strong></p>
                <p><strong>  </strong></p>
                <p><strong>  </strong></p>
                
        </div>
        <div class="col-md-"></div>
    </div>
</div>
