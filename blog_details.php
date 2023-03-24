<?php
// header import
include('./header.php');
$row = $blog->getBlog();
?>

<main>
    <section class="blog-details-hero set-bg" data-setbg="img/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/news1.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/news2.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/news3.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="./img/<?= $row['image'] ?>" alt="">
                        <h3><?= $row['content'] ?></h3>
                        <p><?= $row['title'] ?></p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <?php foreach ($user->getUsers() as $a) {
                                if ($a['role'] == 'admin') { ?>
                                    <div class="col-lg-6">
                                        <div class="blog__details__author">
                                            <div class="blog__details__author__pic">
                                                <img src="./img/users/<?= $a['image'] ?>">
                                            </div>
                                            <div class="blog__details__author__text">
                                                <h6><?= $a['name'] ?></h6>
                                                <span>Admin</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> <?php
                                        foreach($categories->getCategories() as $item){
                                            if($item['id'] == $row['category_id']){
                                                echo $item['name'];
                                            }
                                        } ?></li>
                                        <li><span>Tags:</span> <?= $row['tags'] ?></li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="https://instagram.com/dasturchi_4444" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="https://t.me/dasturchi_4444" target="_blank"><i class="fa-brands fa-telegram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                    </div>
                                </div>
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
                        <h2>Post You May Like</h2>
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
                                        <li><i class="fa-regular fa-calendar"></i> <?= $row['dateTime'] ?></li>
                                        <li><i class="fa-regular fa-comment"></i> 5</li>
                                    </ul>
                                    <h5><a href="blog_details.php?id=<?= $row['id'] ?>"><?= $row['content'] ?></a></h5>
                                    <p><?= substr($row['title'], 0, 85); ?>...</p>
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