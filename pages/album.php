<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem vindo X</title> <!-- X = usuario logado (Session PHP) -->
    <link rel="shortcut icon" href="./icon/icon.png">
    <link rel="stylesheet" href="../css/album.css">
</head>
<body>
    <main class="wrapper">
        <nav class="side-menu">
            <h1 class="album-logo">e-Álbum</h1>
            <div class="profile-data">
                <div style=" overflow: hidden" class="profile-img">
                    <img style="height: 100%" src="../resources/imgs/users/<?php session_start(); echo $_SESSION['name']?>.jpeg">
                </div>
                <h2 class="profile-welcome">Bem vindo <?php echo $_SESSION["name"];?></h2><!-- Usuário = usuário logado (Session PHP) -->
            </div>
            <div class="options-menu">
                <h4 class="options-title">Opções</h4>
                <div class="options-btn">
                    <div class="options-btn-icon"></div>
                    <span class="options-btn-label">Perfil</span>
                </div>
                <div class="options-btn-disabled">
                    <div class="options-btn-icon"></div>
                    <span class="options-btn-label">Novo Álbum</span> <!-- pode ser útil no futuro
                                                                                por enquanto ta desabled -->
                </div>
            </div>
            <span class="log-out"><a href="php/controllers/cr_logout.php">Sair</a></span> <!-- Session destroy aqui -->
        </nav>
        <section class="page-content">
            <div class="album">
                <h1 class="album-title">
                    Meu Álbum <!--  Muda o nome durante a criação de um novo album 
                                    (no futuro vai ser de seleções, dai esse titulo
                                    vão ser o nome das seleções) -->
                </h1>
                <div class="stickers-wrapper">
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                    <div class="sticker"></div>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>