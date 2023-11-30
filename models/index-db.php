<?php session_start();
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
    function login($username, $password) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select userid, username, password from User where username = ? and password = ?;");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user'] = $row['username'];
            $_SESSION['user_id'] = $row['userid'];
            $_SESSION['logged_in'] = "1";
            $result->close();
            $conn->close();
            return true;
        } else {

            $result->close();
            $conn->close();
            return false;
        }
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>