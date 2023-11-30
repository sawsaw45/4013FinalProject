<?php
function getTestIndex()
{
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select username, password from User; ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }

}
function getNotes()
{
    try{
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select `Name`, `Contents`, `Due Date`, `Priority` FROM Notes ");
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