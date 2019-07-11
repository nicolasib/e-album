<?php
    include_once("../functions/op_users.php");
    session_start();
    $login = $_REQUEST["login"];
    $pass = $_REQUEST["pass"];

    $data = login($login, $pass);
    if($data == 0){
        Header('Location: ../../login.html');
    }
    else{
        $_SESSION["id"] = $data["id_user"];
        $_SESSION["name"] = $data["name_user"];
        $_SESSION["email"] = $data["email_user"];
        $_SESSION["pass"] = $data["pass_user"];
        
        Header('Location: ../../album.html');
    }
?>