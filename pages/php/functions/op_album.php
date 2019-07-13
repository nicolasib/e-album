<?php
    include_once('conn.php');
    $conn = connect();

    //0 = erro | outro = sucesso
    function insertCard($id_user, $id_singer, $id_music){
        global $conn;

        $sql = "INSERT INTO card_music (id_user, id_singer, id_music, amount) VALUES (?, ?, ?, ?)";
        $consult = $conn->query($sql);
        $consult = $conn->prepare($sql);
        $amount = 1;
        $consult->bind_param("iiii", $id_user, $id_singer, $id_music, $amount);
        $consult->execute();
        if(!$consult->affected_rows){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | outro = sucesso
    function addCard($id_user, $id_singer, $id_music){
        global $conn;

        $sql = "UPDATE card_music SET amount = amount + 1 WHERE id_user = ?, id_singer = ?, id_music = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iii", $id_user,$id_singer, $id_music);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return $consult->affected_rows;
    }

    //0 = erro | 1 = sucesso
    function deleteCard($id_user, $id_singer, $id_music){
        global $conn;
        
        $sql = "DELETE FROM card_music WHERE id_user = ? AND id_singer = ? AND id_music = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("iii", $id_user, $id_singer, $id_music);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return 1;
    }

    function cardExists($id_user, $id_singer, $id_music) {
        global $conn;
        
        $sql = "SELECT * FROM card_music WHERE id_user = $id_user, id_singer = $id_singer, id_music = $id_music";
        $consult = $conn->query($sql);
        if($consult->num_rows == 0){
            return 0;
        }
        return 1;
    }

    function loadStates($id_user, $id_singer) {
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
        
        $sql = "SELECT * FROM card_music WHERE id_user = $id_user AND id_singer = $id_singer";
        $consult = $conn->query($sql);
        while($data = $consult->fetch_array()) {
            $statesArray[$data["id_music"]] = 1;
        }

        $states = "" . $statesArray[1];
        for ($i = 2; $i < 11; $i++) {
            $states .= ";" . $statesArray[$i];
        }
        return $states;
    }

    function deleteAllOfUser($id_user) {
        global $conn;
        
        $sql = "DELETE FROM card_music WHERE id_user = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("i", $id_user);
        $consult->execute();
    }
?>