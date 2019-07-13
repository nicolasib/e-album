<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = (int)$_SESSION['id'];
    $id_team = $_REQUEST['team'];
    echo loadStates($id_user, $id_team);
?>