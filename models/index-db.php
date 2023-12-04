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

function deleteNote($noteid)
{
    try{
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM Notes WHERE noteid = ?");
        $stmt->bind_param("i", $noteid);
        $stmt->execute();
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateNote($noteid, $name, $contents, $dueDate, $priority){
    try{
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Notes SET `Name` = ?, `Contents` = ?, `Due Date` = ?, `Priority` = ? WHERE noteid = ?");
        $stmt->bind_param("ssssi", $name, $contents, $dueDate, $priority, $noteid);
        $stmt->execute();
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


?>