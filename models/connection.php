<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('159.89.47.44', 'sawyerha_FinalDBUser', '=;#VNe}=4eXu', 'sawyerha_FinalDB');

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}
?>