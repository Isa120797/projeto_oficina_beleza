<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Clientes</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/funcionario-lista.css">
</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Meus Clientes</h1>
        <div class="top-actions">

            <div class="search-box">
                <input type="text" placeholder="Buscar por nome">
                <button class="btn buscar">Buscar</button>
            </div>

            <div class="action-buttons">
                <a href="funcionarios.php" class="btn">Cadastrar</a>
                <a href="#" class="btn outline">Início</a>
            </div>

        </div>
        <div class="table-container">
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
                            <a href="#" class="table-btn editar">Editar</a>
                            <a href="#" clas="table-btn vizualizar">Vizualizar</a>
                            <a href="#" class="table-btn status">Ativar/Inativar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

</body>

