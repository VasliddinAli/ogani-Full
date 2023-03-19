<?php
// header import
include('./header.php');
?>

<main>


    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"><i class="fa-solid fa-phone"></i></span>
                        <h4>Phone</h4>
                        <p>+9989 4444 6050</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"><i class="fa-solid fa-location-dot"></i></span>
                        <h4>Address</h4>
                        <p>Ferghan Kuva. Yangikishlak 486</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"><i class="fa-solid fa-clock"></i></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"><i class="fa-solid fa-envelope"></i></span>
                        <h4>Email</h4>
                        <p>vasliddinali@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="map">
        <!-- <iframe src="https://goo.gl/maps/TY92JFHfEjxZLp3XA" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97258.01795927195!2d71.7204214988401!3d40.379753673036404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb83431937abc5%3A0xcfa4d876b34e7bbc!2z0KTQtdGA0LPQsNC90LAsINCj0LfQsdC10LrQuNGB0YLQsNC9!5e0!3m2!1sru!2s!4v1678941500677!5m2!1sru!2s" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Uzbekistan</h4>
                <ul>
                    <li>Phone: +9989 4444 6050</li>
                    <li>Add: Ferghan Kuva. Yangikishlak 486</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
// footer import
include('./footer.php');
?>