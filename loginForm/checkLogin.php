<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_name'] = $result['username'];

            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">Ingresate correctamente!</p>';
            sleep(1);
            $login = "http://localhost/test-bd/loginForm/index.php";
            header("Location: $login");
            exit; 
        } else {
            echo '<p class="error">Datos incorrectos!</p>';
        }
    }
}
?>