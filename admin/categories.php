<?php
include('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <main class="admin">
        <header>
            <div class="header">
                <div class="header-logo">
                    <img src="../img/logo.png" alt="">
                </div>
                <div class="header-contents">
                    <a href="./admin.php">Products</a>
                    <a href="./categories.php" class="active">Categories</a>
                    <a href="./blog.php">Blog</a>
                    <a href="./cart.php">Cart</a>
                    <a href="./users.php">Users</a>
                </div>
            </div>
        </header>
        <section class="main">
            <nav>
                <button class="btn btn-primary mt-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
            </nav>
            <table class="table table-hover products">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                    </tr>
                </tbody>
                <tbody>
                    <?php foreach($categories->getCategories() as $row){?>
                    <tr>
                        <td><?= $row['id']?></td>
                        <td><img src="../<?= $row['image']?>"></td>
                        <td><?= $row['name']?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </section>
         
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                              <label for="image" class="form-label"> Product image</label>
                              <input type="file" class="form-control" id="image">
                            </div>
                            <div class="mb-3">
                              <label for="name" class="form-label">Product name</label>
                              <input type="text" class="form-control" id="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>