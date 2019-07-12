<?php
    include_once("../functions/op_users.php");
    session_start();
    $id = $_SESSION["id"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    if(isset($_FILES["path"]["tmp_name"]))
        $path = $_FILES["path"]["tmp_name"];
    else
        $path = "same";
    if ($name == $_SESSION['name'] && $email == $_SESSION['email'] 
    && $pass == $_SESSION['pass']) {
        if($path == "same")
            echo "$name;$pass";
        else {
            $return = upload($path, $name);
            if($return == 0){
                echo "Não foi possível fazer a(s) alteração(ões)!";
            }
            else{
                echo "$name;$pass";
            }
        }
    }
    else {
        if(userCollide($name, $email, $id)) {
            echo "Informações já pertencem a um usuário cadastrado!";
        }
        else {
            $return = update($id, $name, $email, $pass, $path, $_SESSION['name']);
            if($return == 0){
                echo "Não foi possível fazer a(s) alteração(ões)!";
            }
            else{
                echo "$name;$pass";
            }
        }
    }
?>