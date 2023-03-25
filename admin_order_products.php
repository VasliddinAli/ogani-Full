<?php
include('./functions.php');

$get_orders = $orders->getOrders($_GET['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php if (isset($_SESSION['admin'])) { ?>
        <main class="admin">
            <header>
                <div class="header">
                    <div class="logout">
                    </div>
                    <div class="header-logo">
                        <form method="post">
                            <button class="btn btn-danger" name="logout" title="EXIT admin panel"><i class="fa-solid fa-arrow-left"></i></button>
                            <?php if (isset($_POST['logout'])) {
                                logOut();
                            } ?>
                        </form>
                        <img src="./img/logo.png" alt="">
                    </div>
                    <div class="header-contents">
                        <a href="./admin.php">Products</a>
                        <a href="./admin_categories.php">Categories</a>
                        <a href="./admin_blog.php">Blog</a>
                        <a href="./admin_users.php">Users</a>
                        <a href="./admin_checkout.php" class="active">Chackout address</a>
                    </div>
                </div>
            </header>
            <section class="main">
                <table class="table table-hover products mt-2 mb-5">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Region</th>
                            <th>Destrict</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>All Sum</th>
                            <th>Added time</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php foreach ($checkout->getCheckout() as $row) { if($row['user_id'] == $_GET['user_id']){ ?>
                            <tr>
                                <td><?= $row['firstName'] ?></td>
                                <td><?= $row['lastName'] ?></td>
                                <td><?= $row['country'] ?></td>
                                <td><?= $row['region'] ?></td>
                                <td><?= $row['district'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['zipCode'] ?></td>
                                <td>$<?= $row['allSum'] ?></td>
                                <td><?= $row['date'] ?></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>

                <div class="mb-3">
                    <h4 class="mb-3 fw-bold">Ordered products</h4>
                    <div class="d-flex gap-2 flex-wrap ">
                        <?php foreach ($get_orders as $row) { ?>
                            <div class="card" style="width: 190px;">
                                <img src="./img/<?= $row['image'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title" title="<?= $row['name'] ?>"><?= substr($row['name'], 0, 11); ?></h5>
                                        <h5 class="card-title" title="One price: $<?= $row['price'] ?>">$ <?= $row['price'] ?></h5>
                                    </div>
                                    <p class="text-end" title="<?= substr($row['date'], 10, 18); ?>"><?= substr($row['date'], 0, 10); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <h4 class="float-end fw-bold">All Products: <?= $row['count'] ?></h4>
                </div>
            </section>
        </main>
    <?php } else {
        header("Location: login.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>