<?php
    include_once('conn.php');
    $conn = connect();

    //0 = erro | outro = sucesso
    function insertCard($id_user, $id_team, $id_player){
        global $conn;

        $sql = "INSERT INTO card_player (id_user, id_team, id_player, amount) VALUES (?, ?, ?, ?)";
        $consult = $conn->query($sql);
        $consult = $conn->prepare($sql);
        $consult->bind_param("sssi", $id_user, $id_team, $id_player, 0);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | outro = sucesso
    function addCard($id_user, $id_team, $id_player){
        global $conn;

        $sql = "UPDATE card_player SET amount = amount + 1 WHERE id_user = ?, id_team = ?, id_player = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("sss", $id_user,$id_team, $id_player);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | 1 = sucesso
    function deleteCard($id_user, $id_team, $id_player){
        global $conn;
        
        $sql = "DELETE * FROM card_player WHERE id_user = ?, id_team = ?, id_player = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("sss", $id_user,$id_team, $id_player);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return 1;
    }

    function cardExists($id_user, $id_team, $id_player) {
        global $conn;
        
        $sql = "SELECT * FROM card_player WHERE id_user = ?, id_team = ?, id_player = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("sss", $id_user,$id_team, $id_player);
        $consult->execute();
        if($consult->num_rows == 0){
            return 0;
        }
        return 1;
    }
?>