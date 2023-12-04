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
function insertNote($name, $contents, $dueDate, $priority)
{
    try{
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Notes (`Name`, `Contents`, `Due Date`, `Priority`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $contents, $dueDate, $priority);
        $stmt->execute();
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

}
?>