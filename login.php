<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Tela de Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


            <h5 class="text-center mb-3">Login</h5>

            <?php if (isset($_GET['erro']) && $_GET['erro'] == 1) : ?>

                <div id="mensagemErro" style="
        background-color: #ffe6f0;
        color: #d63384;
        border: 1px solid #d63384;
        border-radius: 10px;
        padding: 10px;
        text-align: center;
        margin-bottom: 15px;
        font-weight: bold;
    ">
                    E-mail ou senha inválidos!
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('mensagemErro').style.display = 'none';
                    }, 3000);
                </script>

            <?php endif; ?>

            <form action="backend/valida-login.php" method="post">

                <form action="backend/valida-login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Seu email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Sua senha" required>
                    </div>



                    <button type="submit" class="btn btn-dark w-100">
                        Entrar
                    </button>

                    <div class="text-center mt-3">
                        <a href="cadastro-login-funcionario.php">Criar conta</a>
                    </div>

                    <div class="text-end mb-3">
                        <a href="recuperar-senha.php" class="text-decoration-none">Esqueceu sua senha?</a>
                    </div>

                </form>

        </div>

    </div>

</body>

</html>