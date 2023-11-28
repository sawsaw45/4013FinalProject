<?php
require_once("models/connection.php");
require_once("models/index-db.php");
$users = getTestIndex();
$login = login('sawyer', 'password2!');
$pageTitle = "Home";
include "views/header.php";
?>
    <h1>Final Project <?php echo $_SESSION['user_id']?></h1>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <?php while($user = $users->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['password']; ?></td>
            </tr>
        <?php

        } ?>

    </table>
<?php
include "views/footer.php";
?>