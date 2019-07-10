<?php

    include_once('conn.php');
    $conn = conectar();

    //0 = erro | outro = sucesso
    function inserir($nome_user, $email_user, $senha_user) {
        
        global $conn;
        $sql = "INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (?, ?, ?)";
        $consulta = $conn->prepare($sql);
        $consulta->bind_param("sss", $nome_user, $email_user, $senha_user);
        $consulta->execute();
        if ($consulta->affected_rows == 0) {
            return 0;
        }
        return $consulta->affected_rows;
    }

    //0 = erro | outro = sucesso
    function atualizar($id_user, $nome_user, $email_user, $senha_user) {
        
        global $conn;
        $sql = "UPDATE usuario SET nome_user = ?, email_user = ?, senha_user = ? WHERE id_user = ?";
        $consulta = $conn->prepare($sql);
        $consulta->bind_param("sssi", $nome_user, $email_user, $senha_user, $id_user);
        $consulta->execute();
        if ($consulta->affected_rows == 0) {
            return 0;
        }
        return $consulta->affected_rows;
    }

?>