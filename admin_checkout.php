<?php
include('./functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php if (isset($_SESSION['admin'])) { ?>
        <main class="admin">
            <header>
                <div class="header">
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
                        <a href="./admin_checkout.php" class="active">Checkout address</a>
                    </div>
                </div>
            </header>
            <section class="main">
                <table class="table table-hover products mt-3">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Country</th>
                            <th>All Sum</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Others</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php foreach ($checkout->getCheckout() as $row) { ?>
                            <tr>
                                <th><?= $row['id'] ?></th>
                                <td><?= $row['firstName'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['country'] ?></td>
                                <td>$<?= $row['allSum'] ?></td>
                                <td>Waiting...</td>
                                <td><?= $row['date'] ?></td>
                                <td><a class="btn btn-primary p-1" href="./admin_order_products.php?user_id=<?= $row['user_id']?>">Details</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    <?php } else {
        header("Location: login.php");
    } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>