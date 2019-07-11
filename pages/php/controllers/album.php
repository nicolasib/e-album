<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = $_SESSION['id'];
    $id_team = $_REQUEST['team'];
    $id_player = $_REQUEST['player'];

    if (cardExists($id_user, $id_team, $id_player)) {
        addCard($id_user, $id_team, $id_player);
    } else {
        insertCard($id_user, $id_team, $id_player);
    }
?>