<?php
    require 'dbconnect.php';
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
    }
    
    $stmt = $conn->prepare("INSERT INTO cart  "
            . "(prod_id) "
            . "VALUES (?)");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
?>
