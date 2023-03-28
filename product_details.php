<?php
// header import
include('./header.php');
$item_id = $_GET['id'];
$product = $products->getProduct($item_id)[0];


if (isset($_SESSION['user'])) {
    $items = $products->getProducts($_SESSION['user']['id']);
} else {
    $items = $products->getProducts(0);
}

if (isset($_POST['top_sale_submit'])) {
    if (isset($_SESSION['user'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        header("Location: cart.php");
    } else {
        header("Location: login.php");
    }
}
if (isset($_POST['add_wishlist'])) {
    if (isset($_SESSION['user'])) {
        $wishlist->addToWishlist($_POST['wish_item_id'], $_POST['wish_user_id']);
        header("Location: wishlist.php");
    } else {
        header("Location: login.php");
    }
}



?>

<main>


    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="categories.php?id=2">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="./img/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php foreach ($products->getProducts(0) as $row) { ?>
                                <a href="./product_details.php?id=<?= $row['id'] ?>"><img data-imgbigurl="./img/<?= $row['image'] ?>" src="./img/<?= $row['image'] ?>" alt=""></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= $product['name'] ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$<?= $product['price'] ?></div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        <a href="#" class="primary-btn" style="padding: 0;">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $product['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                                <button style="padding: 12px 20px; color: #fff;" type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">ADD TO CART</button>
                            </form>
                        </a>
                        <a href="#" class="primary-btn" style="padding: 0;">
                            <form method="post">
                                <input type="hidden" name="wish_item_id" value="<?php echo $product['id'] ?>">
                                <input type="hidden" name="wish_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                                <button style="padding: 12px 20px; color: #fff;" type="submit" name="add_wishlist" class="btn btn-warning font-size-12">ADD TO WISHLIST</button>
                            </form>
                        </a>

                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://instagram.com/dasturchi_4444" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs1" role="tab" aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($items as $index => $row) {
                    if ($index < 4) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./img/<?= $row['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#">
                                                <form method="post">
                                                    <input type="hidden" name="wish_item_id" value="<?php echo $row['id'] ?>">
                                                    <input type="hidden" name="wish_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                                                    <?php
                                                    if (isset($_SESSION['user']) && $row['have_wishlist'] == 1) {
                                                        echo '<button type="submit" disabled class="btn btn-success font-size-12"><i class="fa-solid fa-check"></i></button>';
                                                    } else {
                                                        echo '<button type="submit" name="add_wishlist" class="btn btn-warning font-size-12"><i class="fa fa-heart"></i></button>';
                                                    }
                                                    ?>
                                                </form>
                                            </a></li>
                                        <li><a href="./product_details.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-eye"></i></a></li>
                                        <li><a href="#">
                                                <form method="post">
                                                    <input type="hidden" name="item_id" value="<?php echo $row['id'] ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                                                    <?php
                                                    if (isset($_SESSION['user']) && $row['have_cart'] == 1) {
                                                        echo '<button type="submit" disabled class="btn btn-success font-size-12"><i class="fa-solid fa-check"></i></button>';
                                                    } else {
                                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12"><i class="fa fa-shopping-cart"></i></button>';
                                                    }
                                                    ?>
                                                </form>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= $row['name'] ?></a></h6>
                                    <h5>$<?= $row['price'] ?></h5>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
</main>

<?php
// footer import
include('./footer.php');
?>