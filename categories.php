<?php
include('./header.php');
$item_id = $_GET['id'];
if(isset($_SESSION['user'])){
    $category_items = $products->getCategoryItems($item_id, $_SESSION['user']['id']);
}else{
    $category_items = $products->getCategoryItems($item_id, 0);
}

if (isset($_POST['top_sale_submit'])) {
    if (isset($_SESSION['user'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        header("Location: categories.php?id=$item_id");
    } else {
        header("Location: login.php");
    }
};
if (isset($_POST['add_wishlist'])) {
    if (isset($_SESSION['user'])) {
        $wishlist->addToWishlist($_POST['wish_item_id'], $_POST['wish_user_id']);
        header("Location: categories.php?id=$item_id");
    } else {
        header("Location: login.php");
    }
}

$category_name = $categories->getCategories();
?>




<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>
                        <?php
                        foreach ($category_name as $name) {
                            if ($item_id == $name['id']) {
                                echo $name['name'];
                            }
                        }
                        ?>
                    </h2>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row featured__filter">
            <?php foreach ($category_items as $row) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix category_<?= $row['category_id'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="./img/<?= $row['image'] ?>">
                            <ul class="featured__item__pic__hover">
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
                        <div class="featured__item__text">
                            <h6><a href="./product_details.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h6>
                            <h5>$<?= $row['price'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>




<?php
include('./footer.php');
?>