<?php
    include_once('conn.php');
    $conn = connect();

    //0 = erro | outro = sucesso
    function insertCard($id_user, $id_team, $id_player){
        global $conn;

        $sql = "INSERT INTO card_player (id_user, id_team, id_player, amount) VALUES (?, ?, ?, ?)";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iiii", $id_user, $id_team, $id_player, 0);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | outro = sucesso
    function addCard($id_user, $id_team, $id_player, $add){
        global $conn;

        $sql = "UPDATE card_player amount = amount + $add WHERE id_user = $id_user, id_team = $id_team, id_player = $id_player";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iiii", $id_user, $id_team, $id_player, 0);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }
?>