<?php
ob_start();
include('./functions.php');

$row = $blog->getBlog();
$row_content = $row['content'];
$row_title = $row['title'];
$row_image = $row['image'];
$row_category_id = $row['category_id'];
$row_tags = $row['tags'];

if (isset($_POST['update_item'])) {
    $content = $_POST['content'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $tags = $_POST['tags'];

    if ($_FILES['image']['name']) {
        $uploads_dir = '../img';
        $tmp_name = $_FILES["image"]["tmp_name"];
        $img_name = $_FILES["image"]["name"];
        $fileType = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $imgName = bin2hex(random_bytes(5));
        $image = "$imgName.$fileType";
        move_uploaded_file($tmp_name, "$uploads_dir/$image");;
        $result = $blog->updateBlog($content, $title, $image, $category_id, $tags);
        unlink($_SERVER['DOCUMENT_ROOT'].'/projects/template/img/'.$row_image);
    }else {
        $result = $blog->updateBlog($content, $title, $row_image, $row_category_id, $tags);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit product</title>
</head>

<body>

    <?php if (isset($_SESSION['admin'])) { ?>
    <div class="container mt-3 mb-3 w-50">

        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label"> Product image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Product content</label>
                    <input type="text" value="<?= $row_content?>" name="content" class="form-control" id="content" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product title</label>
                    <textarea type="text" name="title" class="form-control" id="title" style="height: 100px" required><?= $row_title?></textarea>
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
                    <input type="text" value="<?= $row_tags?>" name="tags" class="form-control" id="tags">
                </div>
                <button type="submit" name="update_item" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php }else{header("Location: login.php");}?>

</body>

</html>