<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Clientes</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/clientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                     <?php
            foreach($clientes as $cliente):
                ?>
                    <tr>

                       <td><?php echo $cliente['id'];?></td>
                        <td><?php echo $cliente['nome'];?></td>
                        <td><?php echo $cliente['data_nascimento'];?></td>
                        <td><?php echo $cliente['data_cadastro'];?></td>
                        <td><?php echo $cliente['endereco'];?></td>
                        <td><?php echo $cliente['email'];?></td>
                        <td><?php echo $cliente['telefone'];?></td>
                        <td><?php echo $cliente['cidade'];?></td>
                       <td><?php echo $cliente['estado'];?></td>
                        <td class="acoes">
                            <a class="table-btn " href="../Funcionario/editar-funcionario.php?id=<?php echo $cliente['id'];?>">Editar</a> 
                            <a href="#" class="btn-visualizar">
                                <i class="bi bi-eye"></i> 
                            </a>
                            <a href="#" class="table-btn status">Ativar/Inativar</a>
                        </td>
                    </tr>
                    <?php
endforeach;
?>

                </tbody>
            </table>
        </div>

    </main>

</body>