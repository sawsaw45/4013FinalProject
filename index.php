<?php
require_once("models/connection.php");
require_once("models/index-db.php");

$pageTitle = "Home";
include "views/header.php";
?>
    <h1>Final Project</h1>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = getTestIndex();
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
<?php
include "views/footer.php";
?>