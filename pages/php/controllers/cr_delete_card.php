<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = (int)$_SESSION['id'];
    $id_singer = 1;//$_REQUEST['singer'];
    $id_music = (int)$_REQUEST['id'];
    echo deleteCard($id_user, $id_singer, $id_music);
?>