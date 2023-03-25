<?php
// header import
include('./header.php');

if(isset($_POST['submit_order'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $zipCode = $_POST['zipCode'];
    $allSum = allSum();

    $checkout->insertCheckout($firstName, $lastName, $country, $region, $district, $address, $zipCode, $allSum);
}
?>

<main>


    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Checkout Order</h4>
                <form method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input name="firstName" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input name="lastName" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input name="country" type="text" required>
                            </div>
                            <div class="checkout__input">
                                <p>Region (City)<span>*</span></p>
                                <input name="region" type="text" class="checkout__input__add" required>
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input name="district" type="text" class="checkout__input__add" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" type="text" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="zipCode" type="text" required>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__subtotal">Subtotal <span>$<?php echo allSum()?></span></div>
                                <div class="checkout__order__total">Total <span>$<?php echo allSum()?></span></div>
                                <button type="submit" name="submit_order" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
// footer import
include('./footer.php');
?>