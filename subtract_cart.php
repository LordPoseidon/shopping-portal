<?php
    require 'dbconnect.php';
    if(isset($_POST["id"])) {
        $id = $_POST["id"];
    }
    
    $sql = "SELECT record FROM cart WHERE prod_id=" .$id;
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    
    $sql = "DELETE FROM cart WHERE record=" .$row[0];
    $result = $conn->query($sql);
    
    $conn->close();
?>
