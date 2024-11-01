<?php

    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: ../");
    }

    if(isset($_GET['logoff'])){
        session_unset();
        session_destroy();
        header("Location: ../");

    }


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iara</title>
    <link rel="stylesheet" href="../css/inicial.css">
    <link rel="icon" type="image/png" href="../img/icone.png">

</head>
<body>
    <div class="top-bar">
        <div class="menu">
            <div class="menu-icon">
                &#9776;
            </div>
            <div class="menu-content">
                <a href="./areaUsuario.php">Área do Usuário</a>
                <a href="./loja.html">Loja</a>
                <a href="./biblioteca.html">Biblioteca de jogos</a>
                <a href="./forum.html">Fórum</a>
                <a href="./suporte.html">Suporte</a>
                <a style="background-color: #ff4d4d; color: white;" href="inicial.php?logoff=1">Encerrar Sessão</a>
            </div>
        </div>
        <input type="text" placeholder="Buscar..." class="search-bar" id="search-input">
        <div class="cart">
            <a href="areaUsuario.php">
                <img height="30px" src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="icone">    
                <?php
                    echo $_SESSION['nome'] . "⁮⁬ ";
                ?>
            </a>
            <a href="../html/carrinho.html">
                <img src="../img/carrinho.png" alt="Carrinho" class="cart-icon">
                Carrinho
            </a>
        </div>
    </div>
    <div class="mais-comprados-section">
        
        <div class="mais-comprados-container">
            <br><br><br><br><br>
            <div class="mais-comprados">
            
                <div class="produto">
                    <img src="../img/Chroma Squad.jpg" alt="Produto 1">
                    <h3>CHROMA SQUAD</h3>
                    <p>Um jogo indie que simula uma série de TV onde você controla um grupo de dublês que decide criar seu próprio programa de TV inspirado em super-heróis japoneses. O jogo combina elementos de estratégia, gerenciamento e RPG tático.</p>
                   
                </div>
                <div class="produto">
                    <img src="../img/Dandara.jpg" alt="Produto 2">
                    <h3>Dandara</h3>
                    <p>Um jogo de plataforma 2D que combina exploração e ação, ambientado em um mundo surreal inspirado na cultura brasileira. O jogador controla a personagem titular, Dandara, em sua jornada para salvar o mundo de Salt.</p>
                   
                </div>
                <div class="produto">
                    <img src="../img/HorizonChase.jpg" alt="Produto 3">
                    <h3>Horizon Chase</h3>
                    <p>Um jogo de corrida inspirado nos clássicos dos anos 80 e 90, como Top Gear e Out Run. Com gráficos modernos e jogabilidade nostálgica, o jogo oferece uma experiência de corrida arcade divertida e desafiadora.</p>
                   
                </div>
                <div class="produto">
                    <img src="../img/Fobia.jpg" alt="Produto 4">
                    <h3>Fobia – St. Dinfna Hotel</h3>
                    <p>Um jogo de quebra-cabeças e aventura onde o jogador assume o papel de um investigador paranormal em um hotel abandonado. Com uma atmosfera sombria e puzzles criativos, o jogo oferece uma experiência única e imersiva.</p>
                  
                </div>
                <div class="produto">
                    <img src="../img/Hazel.jpg" alt="Produto 5">
                    <h3>Hazel Sky</h3>
                    <p>Um jogo de aventura e exploração onde o jogador controla Hazel, uma jovem em busca de sua mãe desaparecida. Com belos gráficos e uma história envolvente, o jogo oferece uma experiência emocionante e cativante.</p>
                  
                </div>
    
                <div class="produto">
                    <img src="../img/paozito.webp" alt="Produto 7">
                    <h3>Pãozito</h3>
                    <p>Um jogo casual onde o jogador controla um pão em sua jornada para se tornar uma torrada. Com controles simples e uma jogabilidade relaxante, o jogo oferece uma experiência divertida e descontraída.</p>
                    
                </div>
            
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector('.menu-icon').addEventListener('click', function() {
            document.querySelector('.menu-content').classList.toggle('show');
        });


        const searchInput = document.getElementById('search-input');
        const produtos = document.querySelectorAll('.produto');

        searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
            produtos.forEach(function(produto) {
                const productName = produto.querySelector('h3').textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                produto.style.display = 'block';
                } else {
                produto.style.display = 'none';
                }
            });
        });
    
    </script>
</body>
</html>