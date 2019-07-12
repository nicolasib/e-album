<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = (int)$_SESSION['id'];
    $id_team = 1;//$_REQUEST['team'];
    $id_player = (int)$_REQUEST['id'];
    echo deleteCard($id_user, $id_team, $id_player);
?>