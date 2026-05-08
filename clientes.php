
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>
<body>


    <?php require_once 'includes/header.php';
    ?>
<div class="container">

<h1>Cadastro de Clientes</h1>

<form>

<div class="form-grid">

<div class="input-group">
<label>Nome</label>
<input type="text">
</div>

<div class="input-group">
<label>Data de nascimento</label>
<input type="date">
</div>

<div class="input-group">
<label>Endereço</label>
<input type="text">
</div>

<div class="input-group">
<label>Email</label>
<input type="email">
</div>

<div class="input-group">
<label>Telefone</label>
<input type="text">
</div>

</div>



</form>
  <input type="submit" value="Cadastrar">

</div>
  
</body>
</html>