<?php
ob_start();
include('../functions.php');

$row = $products->getProduct();
print_r($row);
$name = $row['name'];
$category_id = $row['category_id'];
$price = $row['price'];
$image = $row['image'];
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

    <div class="container mt-3 mb-3 d-flex justify-content-between">

        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Product image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product name</label>
                    <input type="text" value="<?= $name?>" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label>Select category</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <option selected></option>
                        <?php foreach($categories->getCategories() as $row){?>
                        <option value="<?= $row['id']?>"><?= $row['name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" value="<?= $price?>" name="price" class="form-control" id="price" required>
                </div>
                <button type="submit" name="update_item" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>
</html>


<?php

if(isset($_POST['update_item'])){
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    if($_FILES['image']['name']){
        $uploads_dir = '../img';
        $tmp_name = $_FILES["image"]["tmp_name"];
        $img_name = $_FILES["image"]["name"];
        $fileType = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
        $imgName = bin2hex(random_bytes(5));
        $image = "$imgName.$fileType";
        move_uploaded_file($tmp_name, "$uploads_dir/$image");;
        $result = $products->updateProduct($name, $category_id, $price, $image);
        unlink($row['image']);
    }else{
        $result = $products->updateProduct($name, $category_id, $price, $image);
    }
}
?>