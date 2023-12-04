<?php

function getNotes()
{
    try{
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select `noteid`, `Name`, `Contents`, `Due Date`, `Priority` FROM Notes ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;

    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>