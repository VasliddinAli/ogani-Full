<?php
// header import
include('./header.php');
if (isset($_SESSION['user'])) {
    $user_wishlist = $wishlist->getWishlist($_SESSION['user']['id']);
}

if (isset($_POST['delete-wishlist-submit'])) {
    $deletedrecord = $wishlist->deleteWishlist($_POST['id']);
}
?>

<main>

    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <?php if (isset($_SESSION['user']) && $user_wishlist) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Delete</th>
                                        <!-- <th>Total</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($user_wishlist as $item) :
                                        if ($item['user_id'] == $_SESSION['user']['id']) {
                                            $wishlist = $products->getProduct($item['item_id']);
                                            $TotalSum[] = array_map(function ($item) {
                                    ?>
                                                <tr>
                                                    <td class="shoping__cart__item">
                                                        <img src="./img/<?php echo $item['image']; ?>" alt="">
                                                        <h5><?php echo $item['name'] ?? "Unknown"; ?></h5>
                                                    </td>
                                                    <td class="shoping__cart__price">
                                                        $<?php echo $item['price'] ?? 0; ?>
                                                    </td>
                                                    <td class="shoping__cart__total">
                                                        <form method="post">
                                                            <input type="hidden" value="<?php echo $item['id'] ?? 0; ?>" name="id">
                                                            <button type="submit" name="delete-wishlist-submit" class="btn font-baloo btn-danger text-danger px-3 border-right">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                    <?php
                                            }, $wishlist);
                                        }
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {
            echo "<h3 class='text-center'>Wishlist is empty yet :(</h3>";
        } ?>
    </section>
</main>

<?php
// footer import
include('./footer.php');
?>