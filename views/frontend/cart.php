<?php
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Libraries\Cart;
use App\Libraries\MyClass;


if (isset($_REQUEST['addcat'])) {
    $id = $_REQUEST['addcat']; // chi tiết mẫu tin
    $product = Product::find($id);
    $cart_item = [
        'id' => $product->id,
        'qty' => 1,
        'price' => $product->price,
        'amount' => $product->price,
    ];
    
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        if ((Cart::cart_exists($carts, $id)==true)) {
            $carts = Cart::cart_update($carts, $id,1);

        } else {
            $carts[] = $cart_item;
        }
        $_SESSION['contentcart'] = $carts;
    } else {
        $carts[] = $cart_item;
        $_SESSION['contentcart'] = $carts;
    }
    print_r($carts);
    header('location:index.php?option=cart');
}
if (isset($_REQUEST['delcat'])) {
    $id=$_REQUEST['delcat'];
    if(isset($_SESSION['contentcart'])){
    $carts = $_SESSION['contentcart'];
    $carts=Cart::cart_delete($carts,$id);
    $_SESSION['contentcart']=$carts;
    }
}
if (isset($_POST['updateCart'])) {
    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $number) {
        // $number = $qty_array; // Assign the nested array directly to $number
        $carts = $_SESSION['contentcart'];
        $carts =Cart::cart_update($carts, $id, $number, "update");
        $_SESSION['contentcart'] = $carts;
    }
    header('location:index.php?option=cart');
}

if (isset($_POST['checkout'])) {
    $order = new Order();
    $date = getdate();
    $order->code = $date[0];
    $order->user_id = 1; // Thay thế giá trị user_id bằng giá trị tương ứng
    $order->deliveryaddress = $_POST['deliveryadress'];
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    $order->save();

    if ($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $id => $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công dữ liệu mới']);

        }
    }

    unset($_SESSION['contentcart']);
    $_SESSION['contentcart'] = array();
    $_SESSION['success_message'] = "Đặt hàng thành công,!";
    header("Location: index.php?option=cart-checkout");
    exit();
}


if (isset($_REQUEST['checkout'])) {
    require_once('views/frontend/cart-checkout.php');
}else{
    require_once('views/frontend/cart-content.php');
}



