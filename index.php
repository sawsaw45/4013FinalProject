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
            if (updateNote($_POST['noteid'], $_POST['Name'], $_POST['Contents'], $_POST['Due Date'], $_POST['Priority'])) {
                echo '<div class="alert alert-success" role="alert">Note updated.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Delete":
            if (deleteNote($_POST['noteid'])) {
                echo '<div class="alert alert-success" role="alert">Note deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
    }
}

$notes = getNotes();

include "view-index.php";
?>