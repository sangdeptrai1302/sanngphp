<?php
use App\Models\Product;

$content_cart = null;

if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>

<?php require_once('views/frontend/header.php'); ?>

<form action="index.php?option=cart&checkoutCart=true" method="post">
    <section class="cart-container">
        <h1>Giỏ hàng</h1>
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
                    <?php $total = 0; ?>
                    <?php foreach ($content_cart as $id => $cart) : ?>
                        <?php  $product = Product::find($cart['id']); ?>
                        <tr>
                            <td class="cart-item-id"><?= $id; ?></td>
                            <td class="cart-item-image">
                                <a href="index.php?option=product&slug=<?= $product->slug; ?>"><img class="img-fluid w-100" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" /></a>
                            </td>
                            <td class="cart-item-name"><?= $product->name; ?></td>
                            <td class="cart-item-price"><?= number_format($cart['price']); ?> VNĐ</td>
                            <td class="cart-item-quantity">
                                <input style="max-width: 50px;" type="number" name="qty[<?= $id; ?>]" value="<?= $cart['qty']; ?>" min="1">
                            </td>
                            <td class="cart-item-amount"><?= number_format($cart['amount']); ?> VNĐ</td>
                            <td class="cart-item-actions">
                                <a href="index.php?option=cart&delcat=<?= $id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fa fa-remove"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        <?php $total += $cart['amount']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="cart-item-actions">
                            <a href="index.php?option=cart&delcat=all" class="btn btn-sm btn-danger">
                                <i class="fa fa-remove"></i> Xóa Tất cả
                            </a>
                            <input type="submit" name="updateCart" value="Cập nhật" class="btn btn-success" />
                        </td>
                        <td colspan="3">
                            <div class="cart-total text-end m-3 fs-4">Tổng tiền: <?= number_format($total); ?> VNĐ</div>
                            <div style="float:right;margin: 20px;font-size: 120%;" >
                                <button type="submit" class=" text-white btn btn-success" class="text-white text-none" name="checkout">Thanh toán</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h2>Thông tin cá nhân</h2>
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" name="deliveryname" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="deliveryadress" id="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" name="deliveryphone" id="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="deliveryemail" id="email" class="form-control" required>
            </div>
        <?php else : ?>
            <p class="empty-cart">Chưa có sản phẩm trong giỏ hàng.</p>
        <?php endif; ?>
    </section>
</form>
<?php
// Kiểm tra xem có thông báo thành công không
if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị
}
?>

<!-- Hiển thị thông báo thành công nếu có -->
<?php if (isset($successMessage)) : ?>
    <div class="alert alert-success text-center fs-5" style="font-size: x-large;"><?= $successMessage ?></div>
<?php endif; ?>

<?php require_once('views/frontend/footer.php'); ?>
