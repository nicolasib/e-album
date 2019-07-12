<?php
    include_once('conn.php');
    $conn = connect();

    //0 = erro | outro = sucesso
    function insert($name, $email, $pass, $path){
        global $conn;

        $return = upload($path, $name);
        if($return){
            $sql = "INSERT INTO user (name_user, email_user, pass_user) VALUES (?, ?, ?)";
            $consult = $conn->prepare($sql);
            $consult->bind_param("sss", $name, $email, $pass);
            $consult->execute();
            if($consult->affected_rows == 0){
                return 0;
            }
            return $consult->affected_rows;
        }
        return 0;
    }

    //0 = erro | outro = sucesso
    function upload($path, $name){
        $newPath = "../../../resources/imgs/users/$name.jpeg";
        if ($path == $newPath) return 1;
        if(!move_uploaded_file($path, $newPath)){
            return 0;
        }
        return 1;
    }

    function deleteImage($name) {
        unlink("../../../resources/imgs/users/$name.jpeg");
    }

    //0 = erro | outro = sucesso
    function update($id, $name, $email, $pass, $path, $oldName){
        global $conn;

        $return = 1;
        if ($path != "same") {
            deleteImage($oldName);
            $return = upload($path, $name);
        } else if ($name != $oldName) {
            $return = rename("../../../resources/imgs/users/$oldName.jpeg", "../../../resources/imgs/users/$name.jpeg");
        }
        if($return){
            $sql = "UPDATE user SET name_user = ?, email_user = ?, pass_user = ? WHERE id_user = ?";
            $consult = $conn->prepare($sql);
            $consult->bind_param("sssi", $name, $email, $pass, $id);
            $consult->execute();
            if($consult->affected_rows)
                return $consult->affected_rows;
        }
        return 0;
    }

    //0 = erro | outro = sucesso
    function login($login, $pass){
        global $conn;

        $sql = "SELECT * FROM user WHERE name_user = '".$login."' AND pass_user = '".$pass."' OR email_user = '".$login."' AND pass_user = '".$pass."'";
        $consult = $conn->query($sql);
        if($consult->num_rows == 0){
            return 0;
        }
        while($data = $consult->fetch_array()){
            return $data;
        }
    }

    function delete($name){
        global $conn;
        
        deleteImage($name);
        $sql = "DELETE FROM user WHERE name_user = ?";
        $consult = $conn->prepare($sql);
        $consult->bind_param("s", $name);
        $consult->execute();
        if($consult->affected_rows == 0){
            return 0;
        }
        return 1;
    }

    function userExists($name, $email) {
        global $conn;
        
        $sql = "SELECT * FROM user WHERE name_user = '$name' OR email_user = '$email'";
        $consult = $conn->query($sql);
        if($consult->num_rows == 0){
            return 0;
        }
        return 1;
    }

    function userCollide($name, $email, $id) {
        global $conn;
        
        $sql = "SELECT * FROM user WHERE (name_user = '$name' OR email_user = '$email') AND id_user != $id";
        $consult = $conn->query($sql);
        if($consult->num_rows == 0){
            return 0;
        }
        return 1;
    }
?>