<?php
function get_db_connection(){
    $conn = new mysqli('11.110.0.15', 'sawyerha_FinalDBUser', '=;#VNe}=4eXu', 'sawyerha_FinalDB');

    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}
?>