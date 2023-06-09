<?php
// header import
include('./header.php');

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        if (isset($_SESSION['user'])) {
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        } else {
            header("Location: login.php");
        }
    }
}

if (isset($_POST['add_wishlist'])) {
    if (isset($_SESSION['user'])) {
        $wishlist->addToWishlist($_POST['wish_item_id'], $_POST['wish_user_id']);
    } else {
        header("Location: login.php");
    }
}


if(isset($_SESSION['user'])){
    $mahsulotlar = $products->getProducts($_SESSION['user']['id']);
}else{
    $mahsulotlar = $products->getProducts(0);
}
?>

<main>

    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <?php foreach ($categories->getCategories() as $row) { ?>
                                    <li><a href="categories.php?id=<?= $row['id']?>"><?= $row['name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <?php
                                    $count = 1;
                                    foreach ($products->getLatestProducts() as $index => $row) {
                                        $index++;
                                        if ($index % 3 == 0) {
                                            // echo $index;
                                    ?>
                                            <div class="latest-prdouct__slider__item">

                                                <?php
                                                foreach ($products->getLatestProducts() as $key => $row) {
                                                    $key++;
                                                    if ($index >= $key & $key < 4) {
                                                ?>
                                                        <a href="#" class="latest-product__item">
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <?php foreach ($mahsulotlar as $row) { ?>
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg" data-setbg="./img/<?= $row['image'] ?>">
                                                <div class="product__discount__percent">-11%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#">
                                                            <form method="post">
                                                                <input type="hidden" name="wish_item_id" value="<?php echo $row['id'] ?? '1'; ?>">
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
                                                                <input type="hidden" name="item_id" value="<?php echo $row['id'] ?? '1'; ?>">
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
                                            <div class="product__discount__item__text">
                                                <span><?= $row['category_id'] ?></span>
                                                <h5><a href="./product_details.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h5>
                                                <div class="product__item__price">$<?= $row['price'] / 100 * 89; ?> <span>$<?= $row['price'] ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>
                                            <?php $a = 0;
                                            foreach ($mahsulotlar as $count) $a++;
                                            echo $a; ?>
                                        </span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($mahsulotlar as $row) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="./img/<?= $row['image'] ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#">
                                                    <form method="post">
                                                        <input type="hidden" name="wish_item_id" value="<?php echo $row['id'] ?? '1'; ?>">
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
                                                        <input type="hidden" name="item_id" value="<?php echo $row['id'] ?? '1'; ?>">
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
                                        <h6><a href="./product_details.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h6>
                                        <h5>$<?= $row['price'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
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