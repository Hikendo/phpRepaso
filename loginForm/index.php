<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
    
        $userNmae= $_SESSION['user_name'];

        echo "<h1>Hola $userNmae</h1> ";
    // Show users the page! 
}
?>