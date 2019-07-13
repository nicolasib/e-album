<?php
    include_once('conn.php');
    $conn = connect();

    //0 = erro | outro = sucesso
    function insertCard($id_user, $id_team, $id_player){
        global $conn;

        $sql = "INSERT INTO card_player (id_user, id_team, id_player, amount) VALUES (?, ?, ?, ?)";
        $consult = $conn->query($sql);
        $consult = $conn->prepare($sql);
        $amount = 1;
        $consult->bind_param("iiii", $id_user, $id_team, $id_player, $amount);
        $consult->execute();
        if(!$consult->affected_rows){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | outro = sucesso
    function addCard($id_user, $id_team, $id_player){
        global $conn;

        $sql = "UPDATE card_player SET amount = amount + 1 WHERE id_user = ?, id_team = ?, id_player = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iii", $id_user,$id_team, $id_player);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | 1 = sucesso
    function deleteCard($id_user, $id_team, $id_player){
        global $conn;
        
        $sql = "DELETE FROM card_player WHERE id_user = ? AND id_team = ? AND id_player = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iii", $id_user, $id_team, $id_player);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return 1;
    }

    function cardExists($id_user, $id_team, $id_player) {
        global $conn;
        
        $sql = "SELECT * FROM card_player WHERE id_user = $id_user, id_team = $id_team, id_player = $id_player";
        $consult = $conn->query($sql);
        if($consult->num_rows == 0){
            return 0;
        }
        return 1;
    }

    function loadStates($id_user, $id_team) {
        global $conn;
        $statesArray = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
        );
        
        $sql = "SELECT * FROM card_player WHERE id_user = $id_user AND id_team = $id_team";
        $consult = $conn->query($sql);
        while($data = $consult->fetch_array()) {
            $statesArray[$data["id_player"]] = 1;
        }

        $states = "" . $statesArray[1];
        for ($i = 2; $i < 11; $i++) {
            $states .= ";" . $statesArray[$i];
        }
        return $states;
    }

    function deleteAllOfUser($id_user) {
        global $conn;
        
        $sql = "DELETE FROM card_player WHERE id_user = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("i", $id_user);
        $consult->execute();
    }
?>