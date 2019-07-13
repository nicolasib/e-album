<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = $_SESSION['id'];
    $id_singer = 1;//$_REQUEST['singer'];
    $id_music = $_REQUEST['id'];
    echo insertCard($id_user, $id_singer, $id_music);
?>