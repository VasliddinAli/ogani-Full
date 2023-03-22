<?php
// header import
include('./header.php');

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        if (isset($_SESSION['user'])) {
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        } else {
            echo "<script>alert('You are not logged in yet. Please register and try again.');</script>";
        }
    }
}
$in_cart = $cart->getCartId($products->getProducts('cart'));




?>

<main>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero__item set-bg" data-setbg="img/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($categories->getCategories() as $row) { ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="./img/<?= $row['image'] ?>">
                                <h5><a data-filter=".category_<?= $row['id'] ?>"><?= $row['name'] ?></a></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php foreach ($categories->getCategories() as $row) { ?>
                                <li data-filter=".category_<?= $row['id'] ?>"><?= $row['name'] ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($products->getProducts() as $row) {  ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix category_<?= $row['category_id'] ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="./img/<?= $row['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="./product_details.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-eye"></i></a></li>
                                    <li><a href="#">
                                            <form method="post">
                                                <input type="hidden" name="item_id" value="<?php echo $row['id'] ?? '1'; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                                                <?php
                                                if (isset($_SESSION['user']) && in_array($row['id'], $in_cart ?? [])) {
                                                    echo '<button type="submit" disabled class="btn btn-success font-size-12"><i class="fa-solid fa-check"></i></button>';
                                                } else {
                                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12"><i class="fa fa-shopping-cart"></i></button>';
                                                }
                                                ?>
                                            </form>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#"><?= $row['name'] ?></a></h6>
                                <h5>$<?= $row['price'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
                            $count = 1;
                            foreach ($products->getLatestProducts() as $index => $row) {
                                $index++;
                                if ($index % 3 == 0) {
                            ?>
                                    <div class="latest-prdouct__slider__item">
                                        <?php
                                        foreach ($products->getLatestProducts() as $key => $row) {
                                            $key++;
                                            if ($index >= $key & $key < 4) {
                                        ?>
                                                <a href="./product_details.php?id=<?= $row['id'] ?>"" class=" latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="./img/<?= $row['image'] ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?= $row['name'] ?></h6>
                                                        <span>$<?= $row['price'] ?></span>
                                                    </div>
                                                </a>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $items = $blog->getBlogs();
                $a = 0;
                foreach ($items as $row) {
                    $a++;
                    if ($a > 1) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/<?= $row['image'] ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?= $row['dateTime'] ?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="blog_details.php?id=<?= $row['id'] ?>"><?= $row['content'] ?></a></h5>
                                    <p><?= substr($row['title'], 0, 100); ?>...</p>
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