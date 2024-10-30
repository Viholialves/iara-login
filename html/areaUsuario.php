<?php

    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: ../");
    }

    require("../db.php");
    $sql="SELECT * FROM usuarios WHERE id = ".$_SESSION['login'];
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário - Iara Games</title>
    <link rel="icon" type="image/png" href="../img/icone.png">
    <link rel="stylesheet" href="../css/areaUsuario.css"> 
</head>
<body>

    <header>
       


        <h1>Área do Usuário</h1>
    </header>

    <!-- Menu de Navegação do Usuário -->
    <nav class="user-nav">
       
        <a href="privacidade.html"><button class="nav-button">Privacidade</button></a>
        <a href="seguranca.html"><button class="nav-button">Segurança</button></a>
        <a href="historico.html"><button class="nav-button">Histórico de Compras</button></a>
        <a href="inicial.php?logoff=1"><button class="nav-button logout">Encerrar Sessão</button></a>
    </nav>
    <a href="inicial.php"><button class="back-button">Voltar</button></a>

    <?php if($rows > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="user-info">
                <table>
                    <tr>
                        <th>Nome:</th>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    </tr>
                    <tr>
                        <th>Sobrenome:</th>
                        <td><?php echo htmlspecialchars($row['sobrenome']); ?></td>
                    </tr>
                    <tr>
                        <th>CPF:</th>
                        <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                    </tr>
                    <tr>
                        <th>Telefone:</th>
                        <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                    </tr>
                </table>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Nenhum dado encontrado para o usuário.</p>
    <?php endif; ?>
</body>

</html>
