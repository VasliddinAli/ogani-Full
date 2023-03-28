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
                        <img src="./img/logo.png">
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
                <div class="p-2 mt-3 d-flex gap-2 flex-wrap">
                    <?php foreach ($checkout->getCheckout() as $row) {
                        if ($row['user_id'] == $_GET['user_id']) { ?>
                            <div class="card p-3">
                                <h5 class="fw-bold">Name: <span class="fw-normal text-secondary ms-md-2"><?= $row['firstName'] ?></span></h5>
                                <h5 class="fw-bold">Email: <span class="fw-normal text-secondary ms-md-2"><?= $row['email'] ?></span></h5>
                                <h5 class="fw-bold">Country: <span class="fw-normal text-secondary ms-md-2"><?= $row['country'] ?></span></h5>
                                <h5 class="fw-bold">Region: <span class="fw-normal text-secondary ms-md-2"><?= $row['region'] ?></span></h5>
                                <h5 class="fw-bold">District: <span class="fw-normal text-secondary ms-md-2"><?= $row['district'] ?></span></h5>
                                <h5 class="fw-bold">Address: <span class="fw-normal text-secondary ms-md-2"><?= $row['address'] ?></span></h5>
                                <h5 class="fw-bold">Zip Code: <span class="fw-normal text-secondary ms-md-2"><?= $row['zipCode'] ?></span></h5>
                                <h5 class="fw-bold">All Summ: <span class="fw-normal text-secondary ms-md-2">$<?= $row['allSum'] ?></span></h5>
                                <h5 class="fw-bold">Date: <span class="fw-normal text-secondary ms-md-2"><?= $row['date'] ?></span></h5>
                            </div>
                    <?php }
                    } ?>
                </div>

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_orders as $row) { if($row['user_id'] == $_GET['user_id']){ ?>
                                <tr>
                                    <td><img width="70px" src="./img/<?php echo $row['image']; ?>"></td>
                                    <td><?php echo $row['name'] ?? "Unknown"; ?></td>
                                    <td class="fw-bold">$<?php echo $row['price'] ?? 0; ?></td>
                                    <td><?= $row['date'] ?></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    <?php } else {
        header("Location: login.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>