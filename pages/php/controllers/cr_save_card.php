<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = $_SESSION['id'];
    $id_team = 1;//$_REQUEST['team'];
    $id_player = $_REQUEST['id'];
    echo insertCard($id_user, $id_team, $id_player);
?>