<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Tela de Login</title>

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
            <form>
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

    </div>

</body>

</html>