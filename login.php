<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oficina de Beleza - Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Great+Vibes&display=swap" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(255, 192, 203, 0.5), rgba(255, 105, 180, 0.6)),
                url('background.jpg') no-repeat center/cover;
        }

        .container-login {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 42px;
            color: #d63384;
            margin-bottom: 0;
        }

        .logo span {
            font-size: 14px;
            color: #888;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.2);
        }

        .btn-login {
            background: linear-gradient(45deg, #d63384, #ff69b4);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: scale(1.03);
            background: linear-gradient(45deg, #c21870, #ff4da6);
        }

        .forgot {
            font-size: 13px;
            text-align: right;
        }

        .forgot a {
            color: #d63384;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container-login">

        <div class="login-card">

            <div class="logo">
                <h1>Oficina de Beleza</h1>
                <span>Rita Junqueira</span>
            </div>

            <form>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Digite seu email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Digite sua senha">
                </div>

                <div class="forgot mb-3">
                    <a href="#">Esqueceu sua senha?</a>
                </div>

                <button type="submit" class="btn btn-login w-100">Entrar</button>
            </form>

            <div class="footer-text">
                © 2026 • Seu salão, sua beleza ✨
            </div>

        </div>

    </div>

</body>

</html>