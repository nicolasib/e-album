<?php
    include_once("../functions/op_users.php");
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $path = $_FILES["path"]["tmp_name"];

    $return = insert($name, $email, $pass, $path);
    if($return == 0){
        echo "Não foi possível fazer o registro!";
    }
    else{
        header("location: login.php?login=$name&pass=$pass");
    }
?>