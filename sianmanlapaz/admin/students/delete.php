<?php 
     session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !="admin"){
        header("Location: ../../index.php");
        exit;
    }

    //to confirm is that id number exist.. shortcut of if & else condition
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    //DELETE SQL COMMAND
    mysqli_query($conn, "DELETE FROM users WHERE id=$id AND role='student' ");
    header("Location: index.php");
    exit;

?>