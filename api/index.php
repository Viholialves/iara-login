<?php
    session_start();

    if(isset($_SESSION['login'])){
        header("Location: html/inicial.php");
    }

    if(isset($_POST['email']) && isset($_POST['senha'])){
        require("db.php");

        // Prepara a consulta SQL para evitar SQL Injection
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se o usuário foi encontrado
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifica a senha usando password_verify (senha é hash no banco de dados)
            if (password_verify($_POST['senha'], $user['senha'])) {
                // Salva os dados do usuário na sessão
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['login'] = $user['id'];
                
                // Redireciona para o dashboard
                header("Location: ./html/inicial.php");
                exit();
            } else {
                $_SESSION['log'] = "Senha incorreta";
            }
        } else {
            $_SESSION['log'] = "Usuário não encontrado";
        }

    }
?>
<!DOCTYPE html> 
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iara Games - Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" href="./img/icone.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="container-fluid p-0">
        <div class="row">
            <h2 class="logo col-2 text-center text-white">Iara Games</h2>
            <nav class="col-10 navigation d-flex align-items-center">
                <a href="./html/sobrenos.html" class="flex-fill text-white text-center">Sobre</a>
                <a href="./html/servicos.html" class="flex-fill text-white text-center">Serviços</a>
                <a href="./html/contato.html" class="flex-fill text-white text-center">Contato</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="wrapper">
            <div class="form-box login bg-light p-4 rounded-3">
                <h2 class="text-center">LOGIN</h2>
                <form action="./" method="post">
                    <div class="input-box">
                        <span class="icon position-absolute start-0 translate-middle me-3">
                            <ion-icon name="mail-outline" role="img" aria-label="Email icon" class="fs-5"></ion-icon>
                        </span>
                        <input type="email" name="email" required class="form-control" placeholder="E-mail">
                    </div>
                    <div class="input-box">
                        <span class="icon position-absolute start-0 translate-middle me-3">
                            <ion-icon name="lock-closed-outline" role="img" aria-label="Lock icon" class="fs-5"></ion-icon>
                        </span>
                        <input type="password" name="senha" required class="form-control" placeholder="Senha">
                    </div>
                    <div class="remember-forgot d-flex justify-content-between align-items-center mb-3">
                        <a href="./html/esqueceusenha.html">Esqueceu a senha?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <br>
                    <?php
                        if(isset($_SESSION['log'])){
                            echo "<B>".$_SESSION['log'] . "</B>";
                            unset($_SESSION['log']);
                        }
                    ?>
                    <br>
                    <div class="mt-3 text-center">
                        <p class="no-account-text">Não tem uma conta? <a href="./html/cadastro.php" class="register-link">Registre-se</a></p>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
