<?php
function getTestIndex() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT username, password FROM users");
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