<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = (int)$_SESSION['id'];
    $id_singer = $_REQUEST['singer'];
    echo loadStates($id_user, $id_singer);
?>