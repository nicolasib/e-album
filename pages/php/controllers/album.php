<?php
    include_once('../functions/op_album.php');
    session_start();
    $id_user = $_SESSION['id'];
    $id_team = $_REQUEST['team'];
    $id_player = $_REQUEST['player'];

    if (cardExists($id_user, $id_team, $id_player)) {
        $return = addCard($id_user, $id_team, $id_player);
    }
    else {
        $return = insertCard($id_user, $id_team, $id_player);
    }

    if ($return == 0) {
        echo "A figurinha não foi salva!";
    }
?>