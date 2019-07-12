<?php
    include_once("../functions/op_users.php");
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $path = $_FILES["path"]["tmp_name"];

    if(userExists($name, $email)) {
        echo "Usuário já cadastrado!";
    }
    else {
        $return = insert($name, $email, $pass, $path);
        if($return == 0){
            echo "Não foi possível fazer o registro!";
        }
        else{
            echo "$name;$pass";
        }
    }
?>