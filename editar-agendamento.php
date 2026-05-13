<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_oficina_beleza');


try{

$conexao = new PDO( "mysql:host=". SERVIDOR.";dbname=".BANCO.";charset=utf8", USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$sql = "SELECT * FROM tb_agendamento WHERE id=$id";
$comando = $conexao ->prepare($sql);
$comando->execute();

//armazena em um array as pizzas cadastradas no banco de dados
$agendamentos = $comando->fetchAll(PDO::FETCH_ASSOC);

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

<h1>Editar - Agendamentos</h1>

<form action="backend/atualizar-agendamentos.php?id=<?php echo $agendamentos[0] ['id'];?>" method="post">

<div class="form-grid">

<div class="input-group">
<label>Cliente</label>
<input  value="<?php echo $agendamentos[0] ['cliente'];?>"type="text" name="cliente" id="cliente" >
</div>

<div class="input-group">
<label>Funcionário</label>
<input  value="<?php echo $agendamentos[0] ['funcionario'];?>"type="text" name="funcionario" id="funcionario" >
</div>

<div class="input-group">
<label>Serviço</label>
<input  value="<?php echo $agendamentos[0] ['servico'];?>"type="text" name="servico" id="servico" >
</div>


<div class="input-group">
<label>Data</label>
<input  value="<?php echo $agendamentos[0] ['data'];?>"type="date" name="data" id="data">
</div>


<div class="input-group">
<label>Hora</label>
<input  value="<?php echo $agendamentos[0] ['hora'];?>"type="time" name="hora" id="hora" >
</div>


<div class="input-group">
<label>Valor Total</label>
<input  value="<?php echo $agendamentos[0] ['valor'];?>"type="number" name="valor" id="valor" >
</div>


</div>

<input type="submit" value="Salvar">

</form>
  

</div>
  
</body>
</html>