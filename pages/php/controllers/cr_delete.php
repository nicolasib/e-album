<?php
    include_once("../functions/op_users.php");
    session_start();
    $name = $_SESSION["name"];
    $return = delete($name);
    if($return == 0){
        echo "Não foi possível deletar!";
    }
    else{        
        echo "1";
    }
?>