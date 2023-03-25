<?php
include('./functions.php');

if (isset($_POST['submit_blog'])) {
    $content = $_POST['content'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $tags = $_POST['tags'];

    $uploads_dir = './img';
    $tmp_name = $_FILES["image"]["tmp_name"];
    $img_name = $_FILES["image"]["name"];
    $fileType = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $imgName = bin2hex(random_bytes(5));
    $image = "$imgName.$fileType";

    move_uploaded_file($tmp_name, "$uploads_dir/$image");

    $blogs = $blog->setBlog($content, $title, $image, $category_id, $tags);
}

if (isset($_POST['delete-blog'])) {
    $deletedrecord = $blog->deleteBlog($_POST['item_id']);
}
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
                        <?php if(isset($_POST['logout'])){logOut();}?>
                    </form>
                        <img src="./img/logo.png" alt="">
                    </div>
                    <div class="header-contents">
                        <a href="./admin.php">Products</a>
                        <a href="./admin_categories.php">Categories</a>
                        <a href="./admin_blog.php" class="active">Blog</a>
                        <a href="./admin_users.php">Users</a>
                        <a href="./admin_checkout.php">Chackout address</a>
                    </div>
                </div>
            </header>
            <section class="main">
                <nav>
                    <button class="btn btn-primary mt-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Blogs</button>
                </nav>
                <table class="table table-hover products">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>dateTime</th>
                            <th>Buttons</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php foreach ($blog->getBlogs() as $row) { ?>
                            <tr>
                                <th><?= $row['id'] ?></th>
                                <td><img src="./img/<?= $row['image'] ?>"></td>
                                <td><?= $row['content'] ?></td>
                                <td><?= substr($row['title'], 0, 100); ?></td>
                                <td><?= substr($row['tags'], 0, 40); ?></td>
                                <td><?= $row['dateTime'] ?></td>
                                <td>
                                    <div class="btns d-flex gap-2">
                                        <form method="post">
                                            <input type="hidden" value="<?= $row['id'] ?? 0 ?>" name="item_id">
                                            <button type="submit" name="delete-blog" class="btn btn-danger">D</button>
                                        </form>
                                        <form method="get">
                                            <input type="hidden" value="<?= $row['id'] ?? 0 ?>" name="item_id">
                                            <a href="./admin_edit_blog.php?id=<?= $row['id'] ?? 0 ?>" class="btn btn-warning">E</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="image" class="form-label"> Product image</label>
                                    <input type="file" name="image" class="form-control" id="image" required>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Product content</label>
                                    <input type="text" name="content" class="form-control" id="content" required>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product title</label>
                                    <textarea type="text" name="title" class="form-control" id="title" style="height: 100px" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Select category</label>
                                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                                        <option selected></option>
                                        <?php foreach ($categories->getCategories() as $row) { ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" name="tags" class="form-control" id="tags">
                                </div>
                                <button type="submit" name="submit_blog" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <?php } else {
        header("Location: login.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>