<?php
    session_start();
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <section class="modal-wrapper hidden">
        <div class="confirm-modal">
            <h1 class="modal-title">Tem certeza que deseja excluir sua conta?</h1>
            <button class="delete-profile">Sim</button>
            <button class="delete-cancel">Não</button>
        </div>
        <div class="modal-background"></div>
    </section>
    <main class="wrapper">
        <div class="content">
            <h1 class="content-title animated fadeInDown">
                Atualizando informações
            </h1>
            <div class="form-holder animated fadeInUp">
                <form method="post" action="" class="form-update">
                    <div class="image-holder">
                        <div class="degrade"></div>
                        <input type="text" id="first_img" style="display:hidden;" value="../resources/imgs/users/<?php echo $name;?>.jpeg">
                        <img id="image-preview" src="../resources/imgs/users/<?php echo $name;?>.jpeg" class="profile-image">
                        <label for="user-image">Alterar imagem</label>
                        <input type="file" name="path" id="user-image">
                    </div>
                    <div class="input-texts">
                        <label>Usuário</label>
                        <input class="input" type="text" name="name" value="<?php echo $name;?>">
                        <label>E-mail</label>
                        <input class="input" type="email" name="email" disabled value="<?php echo $email;?>">
                        <label>Senha</label>
                        <input class="input" type="password" name="pass" value="<?php echo $pass;?>">
                        <button class="btn-update" id="1" type="submit">Atualizar</button>
                        <button class="btn-delete" id="0" type="submit">Deletar</button>
                        <div class="register-erro"></div>
                        <a href="album.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/AJAX/profile.js"></script>
</body>
</html>