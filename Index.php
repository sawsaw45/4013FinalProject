<?php
require_once("models/index-db.php");
require_once("models/connection.php");



if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (insertNote($_POST['Name'], $_POST['Contents'], $_POST['DueDate'], $_POST['Priority'])) {
                echo '<div class="alert alert-success" role="alert">Note added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Edit":
            if (updateCourse($_POST['cNumber'], $_POST['cDesc'], $_POST['cid'])) {
                echo '<div class="alert alert-success" role="alert">Course edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Delete":
            if (deleteCourse($_POST['cid'])) {
                echo '<div class="alert alert-success" role="alert">Course deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
    }
}

$notes = getNotes();

include "view-index.php";
?>