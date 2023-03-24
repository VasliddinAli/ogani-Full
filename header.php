<?php
include('./functions.php');
if(isset($_SESSION['user'])){
    $user_wishlist = $wishlist->getWishlist($_SESSION['user']['id']);
    $user_cart = $cart->getCart($_SESSION['user']['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css">
</head>

<body>
    
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="./wishlist.php"><i class="fa fa-heart"></i> <span>
                            <?php
                            if (isset($_SESSION['user']) && isset($user_wishlist)) {
                                echo count($user_wishlist);
                            } else {
                                echo 0;
                            } ?></span></a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span>
                            <?php
                            if (isset($_SESSION['user']) && isset($user_cart)) {
                                echo count($user_cart);
                            } else {
                                echo 0;
                            } ?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$<?php allSum();?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="dropdown header__top__right__auth">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-circle-user"></i> Your profile
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li><a class="dropdown-item" href="#">Name: <strong><?php echo $_SESSION['user']['name']; ?></strong></a></li>
                            <li><a class="dropdown-item" href="#">Email: <strong><?php echo $_SESSION['user']['email']; ?></strong></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a style="color: #ff0000;" class="dropdown-item" href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> LogOut</a></li>
                        <?php } ?>
                    </ul>
                <?php } else {
                    echo '<a href="./login.php"><i class="fa fa-user"></i> Login</a>';
                } ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="pages_check.php">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://instagram.com/dasturchi_4444" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> vasliddinali@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>


    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> vasliddinali@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://instagram.com/dasturchi_4444" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="dropdown header__top__right__auth">
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-circle-user"></i> Your profile
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                        <?php if (isset($_SESSION['user'])) { ?>
                                            <li><a class="dropdown-item" href="#">Name: <strong><?php echo $_SESSION['user']['name']; ?></strong></a></li>
                                            <li><a class="dropdown-item" href="#">Email: <strong><?php echo $_SESSION['user']['email']; ?></strong></a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a style="color: #ff0000;" class="dropdown-item" href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> LogOut</a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } else {
                                    echo '<a href="./login.php"><i class="fa fa-user"></i> Login</a>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="pages_check.php">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="./wishlist.php"><i class="fa fa-heart"></i> <span>
                                        <?php
                                        if (isset($_SESSION['user']) && isset($user_wishlist)) {
                                            echo count($user_wishlist);
                                        } else {
                                            echo 0;
                                        } ?></span></a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span>
                                        <?php
                                        if (isset($_SESSION['user']) && isset($user_cart)) {
                                            echo count($user_cart);
                                        } else {
                                            echo 0;
                                        }
                                        ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$<?php allSum();?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>


    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php foreach ($categories->getCategories() as $row) { ?>
                                <li><a href="#"><?= $row['name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><a href="tel:+998 94 444 60 50" style="color: #000;">+9989 4444 6050</a></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>