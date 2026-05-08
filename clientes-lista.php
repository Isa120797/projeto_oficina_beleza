<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Clientes</title>

    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
    <link rel="stylesheet" href="assets/css/tabela.css">
    
</head>
<body>

<?php require_once 'includes/header.php'; ?>

<div class="container">

    <h1>Meus Clientes</h1>

    <!-- BUSCA -->
    <div class="top-bar">
        <input type="text" placeholder="Buscar por nome">
        <button>Buscar</button>

        <a href="cadastro_cliente.php" class="btn-cadastrar">Cadastrar</a>
    </div>

    <!-- TABELA -->
    <div class="tabela-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data Nasc.</th>
                    <th>Cadastro</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <!-- EXEMPLO -->
                <tr>
                    <td>1</td>
                    <td>Maria Silva</td>
                    <td>10/02/1995</td>
                    <td>01/04/2026</td>
                    <td>Rua A, 123</td>
                    <td>maria@email.com</td>
                    <td>(11) 99999-9999</td>
                    <td>São Paulo</td>
                    <td>SP</td>

                    <td class="acoes">
                        <a href="visualizar_cliente.php?id=1">👁</a>
                        <a href="editar_cliente.php?id=1">✏️</a>
                        <a href="status_cliente.php?id=1">🔄</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>