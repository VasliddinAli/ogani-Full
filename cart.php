<?php
// header import
include('./header.php');
if (isset($_POST['delete-cart-submit'])) {
    $deletedrecord = $cart->deleteCart($_POST['id']);
}
?>

<main>

    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <!-- <th>Total</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($products->getProducts('cart') as $item) :
                                    $cart = $products->getProduct($item['item_id']);
                                    $subTotal[] = array_map(function ($item) {
                                ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="./img/<?php echo $item['image']; ?>" alt="">
                                                <h5><?php echo $item['name'] ?? "Unknown"; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                $<?php echo $item['price'] ?? 0; ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <button class="qty-up border bg-light" data-id="<?php echo $item['id'] ?? 0 ?>"><i class="fas fa-angle-up"></i></button>
                                                        <input type="text" data-id="<?php echo $item['id'] ?? 0 ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                                        <button data-id="<?php echo $item['id'] ?? 0 ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                    <form method="post">
                                                        <input type="hidden" value="<?php echo $item['id'] ?? 0; ?>" name="id">
                                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                                    </form>
                                            </td>
                                        </tr>
                                <?php
                                        return $item['price'];
                                    }, $cart); // closing array_map function
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button class="btn primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>Upadate Cart</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </div>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// footer import
include('./footer.php');
?>