<?php session_start(); $name = $_SESSION["name"];?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem vindo <?php echo $name;?>!</title> <!-- X = usuario logado (Session PHP) -->
    <link rel="shortcut icon" href="./icon/icon.png">
    <link rel="stylesheet" href="../css/album.css">
</head>
<body>
    <section class="modal-wrapper hidden">
        <div class="confirm-modal">
            <h1 class="modal-title">Tem certeza que deseja colar?</h1>
            <button class="modal-submit">Sim</button>
            <button class="modal-cancel">Não</button>
        </div>
        <div class="modal-background"></div>
    </section>
    <main class="wrapper">

        <nav class="collapsed-menu">
            <h1 class="album-logo">e-Álbum</h1>
            <button class="hamburger-menu">☰</button>
        </nav>


        <div class="collapsed-wrapper">
            <div class="collapsed-options">
                <button class="close-collapsed">Fechar</button>
                <div class="profile-data">
                    <div class="profile-img">
                        <img src="../resources/imgs/users/<?php echo $name;?>.jpeg">
                    </div>
                    <h2 class="profile-welcome">Bem vindo <?php echo $name;?>!</h2><!-- Usuário = usuário logado (Session PHP) -->
                </div>
                <div class="options-menu">
                    <h4 class="options-title">Opções</h4>
                    <a href="profile.php">
                        <div class="options-btn">
                            <div class="options-btn-icon"></div>
                            <span class="options-btn-label">Perfil</span>
                        </div>
                    </a>
                    <div class="options-btn-disabled">
                        <div class="options-btn-icon"></div>
                        <span class="options-btn-label">Novo Álbum</span> <!-- pode ser útil no futuro
                                                                        por enquanto ta desabled -->
                    </div>
                </div>
                <span class="log-out"><a href="php/controllers/cr_logout.php">Sair</a></span> <!-- Session destroy aqui -->
            </div>
        </div>



        <nav class="side-menu">
            <h1 class="album-logo">e-Álbum</h1>
            <div class="profile-data">
                <div class="profile-img">
                    <img src="../resources/imgs/users/<?php echo $name;?>.jpeg">
                </div>
                <h2 class="profile-welcome">Bem vindo <?php echo $name;?>!</h2><!-- Usuário = usuário logado (Session PHP) -->
            </div>
            <div class="options-menu">
                <h4 class="options-title">Opções</h4>
                <a href="profile.php">
                    <div class="options-btn">
                        <div class="options-btn-icon"></div>
                        <span class="options-btn-label">Perfil</span>
                    </div>
                </a>
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
                    Seleção Brasileira <!--  Muda o nome durante a criação de um novo album 
                                    (no futuro vai ser de seleções, dai esse titulo
                                    vão ser o nome das seleções) -->
                </h1>
                <div class="stickers-wrapper">
                    <div class="sticker" id="1"></div>
                    <div class="sticker" id="2"></div>
                    <div class="sticker" id="3"></div>
                    <div class="sticker" id="4"></div>
                    <div class="sticker" id="5"></div>
                    <div class="sticker" id="6"></div>
                    <div class="sticker" id="7"></div>
                    <div class="sticker" id="8"></div>
                    <div class="sticker" id="9"></div>
                    <div class="sticker" id="10"></div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/AJAX/album.js"></script>
</body>
</html>