<?php
// captura o token do link do e-mail enviado
$token = $_GET['token'];


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Tela de Cadastro</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonte do título -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

  <style>
    body {
      height: 100vh;
      margin: 0;
      background-image: url("assets/img/Fundo\ suave\ com\ brilhos\ delicados.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .titulo {
      font-family: 'Great Vibes', cursive;
      font-size: 70px;
      color: white;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      font-size: 90px;
    }

    .card-login {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
    }
  </style>
</head>

<body>

  <div class="container d-flex flex-column align-items-center vh-100">

    <!-- TÍTULO -->
    <h1 class="titulo text-center mt-5 mb-4">
      Oficina de Beleza <br> Rita Junqueira
    </h1>

    <!-- FORMULÁRIO -->
    <div class="card card-login shadow-lg p-4" style="width: 350px;">

      <h5 class="text-center mb-3">Nova Senha</h5>

      <form action="backend/nova-senha.php?token=<?php echo $token ?>" method="post">


        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="confirmar" class="form-label">Confirmar Senha</label>
          <input type="password" name="confirmar" id="confirmar" class="form-control" required>
        </div>



        <button type="submit" class="btn btn-dark w-100">
          Enviar
        </button>

        <div class="text-center mt-3">
          <a href="login.php" style="color: #d63384; font-weight:bold; text-decoration:none;">
            ← Voltar para o Login
          </a>
        </div>

      </form>

    </div>

  </div>

</body>

</html>