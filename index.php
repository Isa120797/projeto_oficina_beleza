<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Tela de Login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      height: 100vh;
      background-image: url('assets/img/Oficina\ de\ Beleza\ Rita\ Junqueira.png'); /* coloque o caminho da sua imagem aqui */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .card-login {
      background-color: rgba(255, 255, 255, 0.9); /* leve transparência */
      border-radius: 15px;
    }
  </style>
</head>

<body class="d-flex justify-content-center align-items-center">

  <div class="card card-login shadow-lg p-4" style="width: 350px;">

    <h4 class="text-center mb-4">Entrar</h4>

    <form>

      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" placeholder="Seu nome" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Seu email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" placeholder="Sua senha" required>
      </div>

      <div class="text-end mb-3">
        <a href="#" class="text-decoration-none">Esqueceu sua senha?</a>
      </div>

      <button type="submit" class="btn btn-dark w-100">
        Entrar
      </button>

    </form>

  </div>

</body>
</html>