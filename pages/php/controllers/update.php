<?php
    include_once("../functions/op_users.php");
    session_start();
    $id = $_SESSION["id"];
    $name = $_SESSION["name"]
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $path = "../../../resources/imgs/users/$name.jpeg";

    $return = update($id, $name, $email, $pass, $path);
    if($return == 0){
        echo "Não foi possível fazer a(s) alteração(ões)!";
    }
    else{
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $pass;
        header("location: ../../album.html");
    }
?>