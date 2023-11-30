<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Doo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    require_once("models/connection.php");
    require_once("models/index-db.php");
    $loggedin = false;

    if (isset($_SESSION['logged_in'])) {
        $loggedin = true;
    }
    ?>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" aria-current="page" href="index.php">Notes</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                    <?php if($loggedin = false) { ?>
                        <li class="nav-item me-auto" style="padding-left:10px;padding-right:10px;">
                            <a><?php include"views/register-newform.php"?></a>
                        </li>
                        <li class="nav-item me-auto">
                            <a> <?php include"views/login-form.php"?></a>
                        </li>
                    <?php } ?>

                    <?php if($loggedin = true) { ?>
                        <li class="nav-item me-auto">
                            <a><?php include"views/logoutform.php"?></a>
                        </li>
                    <?php } ?>

                </ul>

            </div>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

    <h1>Final Project <?php ?></h1>

<form method="post" action="">
<input type="hidden" name="submit" value="submit">
<button type="submit" class="btn btn-primary">
    Test Login
</button>
</form>
<?php if(isset($_POST['submit'])) {
    try {
        login("sawyer", "password2!");
    } catch (Exception $e) {
        //hopefully it doenst need to be caught
    }
} ?>
    </table>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1" href="/">
                    <svg class="bi" height="24" width="30"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">©Sawyer Hays <small><del>hey this counts as a row right??</del></small></span>
            </div>
        </footer>
    </div>
</html>