<?php
    include_once('conn.php');
    $conn = conectar();

    //0 = erro | outro = sucesso
    function insert($nome_user, $email_user, $senha_user) {
        global $conn;

        $sql = "INSERT INTO user (nome_user, email_user, senha_user) VALUES (?, ?, ?)";
        $consulta = $conn->prepare($sql);
        $consulta->bind_param("sss", $nome, $email, $senha);
        $consulta->execute();
        if ($consulta->affected_rows == 0) {
            return 0;
        }
        return $consulta->affected_rows;
    }

    //0 = erro | outro = sucesso
    function update($id_user, $nome_user, $email_user, $senha_user) {
        global $conn;
        $nome = ?;
        $email = ?;
        $senha = ?;
        $id = ?;

        $sql = "UPDATE user SET nome_user = $nome, email_user = $email, senha_user = $senha WHERE id_user = $id";
        $consulta = $conn->query($sql);
        if ($consulta->affected_rows == 0) {
            return 0;
        }
        return $consulta->affected_rows;
    }

    //0 = erro | outro = sucesso
    function login() {
        global $conn;
        $login = ?;
        $senha = ?;

        $sql = "SELECT * FROM user WHERE nome_user = '$login' AND senha_user = '$senha' OR email_user = '$login' AND senha_user = '$senha'";
        $consulta = $conn->query($sql);
        if($consulta->num_rows == 0){
            return 0;
        }
        while($dados = $consulta->fetch_array()){
            return $dados['id'];
        }
    }
?>