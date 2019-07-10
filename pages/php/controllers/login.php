<?php
    include_once("../functions/op_users.php");
    session_start();
    $login = $_REQUEST["login"];
    $pass = $_REQUEST["pass"];

    $data = login($login, $pass);
    if($data == 0){
        echo"Email ou senha errado!";
    }
    else{
        $_SESSION["id"] = $data["id"];
        $_SESSION["name"] = $data["name"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["pass"] = $data["pass"];
    }
?>