<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_oficina_beleza');


try{

$conexao = new PDO( "mysql:host=". SERVIDOR.";dbname=".BANCO.";charset=utf8", USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$sql = "SELECT * FROM tb_cliente WHERE id=$id";
$comando = $conexao ->prepare($sql);
$comando->execute();

//armazena em um array as pizzas cadastradas no banco de dados
$clientes = $comando->fetchAll(PDO::FETCH_ASSOC);

 //formata o código para exibição via var_dump
// echo"<pre>";
// var_dump($pizzas);



}catch(PDOException $erro){
    echo "Erro ao conectar no banco de dados".$erro-> getMessage();
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Cliente</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>
<body>


    <?php require_once 'includes/header.php';
    ?>
<div class="container">

<h1>Editar - Clientes</h1>

<form action="backend/atualizar-clientes.php?id=<?php echo $clientes[0] ['id'];?>" method="post">

<div class="form-grid">

<div class="input-group">
<label>Nome</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="nome" id="nome" required>
</div>

<div class="input-group">
<label>Data de nascimento</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="data_nascimento" id="data_nascimento" required>
</div>

<div class="input-group">
<label>Data de Cadastro</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="data_cadastro" id="data_cadastro" required>
</div>


<div class="input-group">
<label>Endereço</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="endereco" id="endereco" required>
</div>


<div class="input-group">
<label>Email</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="email" id="email" required>
</div>


<div class="input-group">
<label>Telefone</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="telefone" id="telefone" required>
</div>

<div class="input-group">
<label>Cidade</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="cidade" id="cidade" required>
</div>


<div class="input-group">
<label>Estado</label>
<input  value="<?php echo $clientes[0] ['nome'];?>"type="text" name="estado" id="estado" required>
</div>


</div>



</form>
  <input type="submit" value="Cadastrar">

</div>
  
</body>
</html>