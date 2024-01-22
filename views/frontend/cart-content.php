<?php
use App\Models\Product;

$content_cart = null;

if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart" method="post">
<section class="cart-container">
    <h1 class="text-center">Giỏ hàng</h1>
    <?php if ($content_cart != null) : ?>
        <table class="cart-items table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th style="width: 300px;">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0;?>
                <?php foreach ($content_cart as $cart) : ?>
                    <?php  $product = Product::find($cart['id']); ?>
                    <tr>
                    <td class="cart-item-name"><?= $cart['id']; ?></td>

                        <td class="cart-item-image">
                        <a href="index.php?option=product&slug=<?= $product->slug; ?>"> <img class="img-fluid w-100" src="public/dist/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" />
                        </td>
                        <td class="cart-item-name"><?= $product->name; ?></td>
                        <td class="cart-item-price"><?= number_format($cart['price']); ?> VNĐ</td>
                        <td class="cart-item-quantity " >
                                 <input style="max-width: 50px;" type="number" name="qty[<?= $cart['id']; ?>]" value="<?= $cart['qty']; ?>" min="1">
                        </td>
                        <td class="cart-item-amount"><?= number_format($cart['amount']); ?> VNĐ</td>
                        <td class="cart-item-actions">
                        <a href="index.php?option=cart&delcat=<?=$cart['id'];?>"class="btn btn-sm btn-danger">
                            <i class="fa fa-remove"></i> Xóa                   
                        </a>
                        </td>
                    </tr>
                    <?php $total+=$cart['amount'];?>
                <?php endforeach; ?>
            </tbody>
        <tr>
                <th colspan="4"class="cart-item-actions">
                        <a href="index.php?option=cart&delcat=all"class="btn btn-sm btn-danger">
                            <i class="fa fa-remove"></i> Xóa Tat ca                  
                        </a>
                        
                <input type="submit" name="updateCart" name="qty:[<?= $cart['id']; ?>]" value="Cập nhật" value="<?= $cart['qty']; ?>" class="btn btn-success"/>
                </th>
                <th colspan="4">
                <div class="cart-total text-end m-3 fs-4">Tổng tiền: <?= number_format($total); ?> VNĐ</div>
                <div style="float:right;margin: 20px;font-size: 120%;" class=" text-white btn btn-success">
                    <a class="text-white text-none" href="index.php?option=cart&checkout=true">Thanh toán</a>
                </div>
                </th>
            </tr>
            </table>

    <?php else : ?>
        <p class="empty-cart text-center fs-4">Chưa có sản phẩm trong giỏ hàng.</p>
    <?php endif; ?>
</section>
</form>
<?php require_once('views/frontend/footer.php'); ?>
