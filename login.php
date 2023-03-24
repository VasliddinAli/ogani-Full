<?php
include('./functions.php');


$error = "";
if (isset($_POST['sign'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = md5($pass);
    $row = $user->getUser($email);
    if ($email != $row['email']) {
        $user->setUser($name, $email, $password);
        header("Location: login.php");
    } else {
        $error = "This email is already use";
    }
}


$result = $user->getUsers();
if (isset($_POST['login'])) {
    foreach ($result as $user) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password = md5($pass);
        if ($user['email'] == $email && $user['password'] == $password) {
            if ($user['role'] == 'admin') {
                $_SESSION['admin'] = $user;
                header("Location: admin.php");
            } else {
                $_SESSION['user'] = $user;
                header("Location: index.php");
            }
        } else {
            $error = "Email or password incorrect. Please, try again :(";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login | Registration</title>
    <style>
        body {
            background-color: #aaa;
        }

        .card {
            width: 400px;
            border: none;
        }

        .btr {
            border-top-right-radius: 5px !important;
        }

        .btl {
            border-top-left-radius: 5px !important;
        }

        .btn-dark {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-dark:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .nav-pills {
            display: table !important;
            width: 100%;
        }

        .nav-pills .nav-link {
            border-radius: 0px;
            border-bottom: 1px solid #0d6efd40;
        }

        .nav-item {
            display: table-cell;
            background: #0d6efd2e;
        }

        .form {
            padding: 10px;
            height: 300px;
        }

        .form input {
            margin-bottom: 12px;
            border-radius: 3px;
        }

        .form input:focus {
            box-shadow: none;
        }

        .form button {
            margin-top: 20px;
        }

        .gotohome {
            text-align: center;
            text-decoration: none;
            color: #000;
            font-size: 20px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <a href="index.php" class="gotohome">Go to home</a>

    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                    <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="post" class="form px-4 pt-5">
                        <input type="email" name="email" class="form-control" placeholder="Email or Phone" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <button type="submit" class="btn btn-dark btn-block" name="login">Login</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form method="post" class="form px-4">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <button type="submit required" class="btn btn-dark btn-block" name="sign">Signup</button>
                    </form>
                </div>
                <p class="text-center"><?php echo $error; ?></p>
            </div>
        </div>
    </div>
</body>

</html>