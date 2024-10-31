<?php
    session_start();

    if(isset($_SESSION['login'])){
        header("Location: html/inicial.html");
    }

    if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['cpf']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['senha2']) && isset($_POST['senha'])){
        if($_POST['senha'] == $_POST['senha2']){
            require("../db.php");


            $result00 = $conn->query("select * from usuarios");
            $email="";
            $cpf="";
            while($row00 = $result00->fetch_assoc()){
                if($row00['email'] == $_POST['email']){
                    $email = "existe";
                }
                if($row00['cpf'] == $_POST['cpf']){
                    $cpf = "existe";
                }
            }

            if($email != "existe" && $cpf != "existe"){
                // Prepara a consulta SQL para evitar SQL Injection
                $sql = "INSERT INTO `usuarios`(`nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`) VALUES (?,?,?,?,?,?)";
                $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssss', $_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['tel'], $_POST['email'], $senha);
                $stmt->execute();
                $result = $stmt->get_result();

                $_SESSION['log'] = "Usuario cadastrado!";
                header("Location: ../");
                exit();

            }
            $_SESSION['log']="";
            if ($email == "existe"){
                $_SESSION['log'] = "<br>E-mail já cadastrado!";

            }

            if ($cpf == "existe"){
                $_SESSION['log'] = $_SESSION['log'] . "<br>CPF já cadastrado!";

            }


        }

    }
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iara Games</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="icon" type="image/png" href="../img/icone.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="container-fluid p-0">
        <div class="row">
            <h2 class="logo col-2 text-center text-white">Iara Games</h2>
            <nav class="col-10 navigation d-flex align-items-center">
                <a href="./sobrenos.html" class="flex-fill text-white text-center">Sobre</a>
                <a href="./servicos.html" class="flex-fill text-white text-center">Serviços</a>
                <a href="./contato.html" class="flex-fill text-white text-center">Contato</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1 class="text-center">Registre-se</h1>
        <form id="formCadastro" action="./cadastro.php" method="POST" >
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Digite seu telefone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="form-group">
                <label for="repetir-senha">Repetir Senha</label>
                <input type="password" class="form-control" name="senha2" id="repetir-senha" placeholder="Repita sua senha" required>
            </div>
            <?php
            if(isset($_SESSION['log'])){
                echo "<b style='color: white;'>" . $_SESSION['log'] . "</b><br>";
                unset($_SESSION['log']);
            }
            ?>
            <div class="container text-center mt-4">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>  
        // Função para tratar o registro do usuário e redirecionar para a página anterior
        function cadastrarUsuario(event) {
            event.preventDefault(); // Impede o comportamento padrão de envio do formulário
       
            // Seleciona os campos de senha e repetir senha
            const senha = document.getElementById('senha').value;
            const repetirSenha = document.getElementById('repetir-senha').value;
       
            // Verifica se as senhas são iguais
            if (senha !== repetirSenha) {
                alert('As senhas não coincidem. Por favor, verifique e tente novamente.'); // Mensagem de erro
                return; // Interrompe a execução se as senhas forem diferentes
            }
        }

        // Função para aplicar máscara no CPF
        function mascaraCPF(cpf) {
            cpf = cpf.replace(/\D/g, ""); // Remove tudo o que não é dígito
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após os 3 primeiros dígitos
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após os 6 primeiros dígitos
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca hífen entre o terceiro bloco e os dois últimos dígitos
            return cpf;
        }

        // Função para aplicar máscara no telefone
        function mascaraTelefone(telefone) {
            telefone = telefone.replace(/\D/g, ""); // Remove tudo o que não é dígito
            telefone = telefone.replace(/(\d{2})(\d)/, "($1) $2"); // Coloca parênteses em torno dos 2 primeiros dígitos
            telefone = telefone.replace(/(\d{5})(\d)/, "$1-$2"); // Coloca hífen após os 5 primeiros dígitos
            return telefone;
        }

        // Função para adicionar as máscaras automaticamente nos campos
        window.onload = function() {
            // Campo CPF
            var cpfInput = document.getElementById('cpf');
            cpfInput.addEventListener('input', function() {
                this.value = mascaraCPF(this.value);
            });

            // Campo Telefone
            var telefoneInput = document.getElementById('tel');
            telefoneInput.addEventListener('input', function() {
                this.value = mascaraTelefone(this.value);
            });

        };
    </script>        
</body>
</html>
