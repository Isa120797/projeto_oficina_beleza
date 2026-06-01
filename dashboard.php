<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Oficina de Beleza</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================
            SIDEBAR
        ==========================*/

       .sidebar{
    width: 270px;
    height: 100vh;
    background: linear-gradient(180deg, #d63384, #ec407a);
    position: fixed;
    left: 0;
    top: 0;
    padding: 30px 20px;
}

        .logo{
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .menu{
            list-style: none;
            padding: 0;
        }

        .menu li{
            margin-bottom: 15px;
        }

        .menu a{
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            border-radius: 12px;
            transition: 0.3s;
            font-size: 17px;
        }

        .menu a:hover{
            background-color: rgba(255,255,255,0.15);
        }

        .menu .ativo{
            background-color: white;
            color: #1565c0;
            font-weight: bold;
        }

        /* =========================
            CONTEÚDO
        ==========================*/

        .conteudo{
            margin-left: 270px;
            padding: 30px;
        }

        /* =========================
            TOPO
        ==========================*/

        .topo{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .titulo-dashboard h1{
            font-size: 35px;
            color: #1f2937;
            font-weight: bold;
        }

        .titulo-dashboard p{
            color: gray;
            font-size: 17px;
        }

        .perfil{
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icone-topo{
            width: 45px;
            height: 45px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            cursor: pointer;
        }

        .avatar{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #1565c0;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* =========================
            CARDS
        ==========================*/

        .card-dashboard{
            border: none;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card-dashboard:hover{
            transform: translateY(-5px);
        }

        .icone-card{
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            color: white;
            margin-bottom: 20px;
        }

        .bg-clientes{
            background-color: #1565c0;
        }

        .bg-agenda{
            background-color: #8e24aa;
        }

        .bg-vendas{
            background-color: #2e7d32;
        }

        .bg-produtos{
            background-color: #ef6c00;
        }

        .numero-card{
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
        }

        .texto-card{
            color: gray;
            font-size: 16px;
        }

        /* =========================
            TABELAS
        ==========================*/

        .card-tabela{
            background-color: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .titulo-secao{
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #1f2937;
        }

        table{
            width: 100%;
        }

        th{
            color: gray;
            font-weight: 600;
            padding-bottom: 15px;
        }

        td{
            padding: 15px 0;
            border-top: 1px solid #eee;
        }

        /* =========================
            META
        ==========================*/

        .meta{
            background: linear-gradient(135deg, #1565c0, #42a5f5);
            color: white;
            border-radius: 20px;
            padding: 30px;
        }

        .barra{
            width: 100%;
            height: 12px;
            background-color: rgba(255,255,255,0.3);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .progresso{
            width: 76%;
            height: 100%;
            background-color: white;
        }

        /* =========================
            RESPONSIVO
        ==========================*/

        @media(max-width: 992px){

            .sidebar{
                display: none;
            }

            .conteudo{
                margin-left: 0;
            }

        }

    </style>
</head>
<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">
            Oficina de Beleza
        </div>

        <ul class="menu">

            <li>
                <a href="#" class="ativo">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="clientes-lista.php">
                    <i class="fa-solid fa-users"></i>
                    Clientes
                </a>
            </li>

            <li>
                <a href="funcionarios-lista.php">
                    <i class="fa-solid fa-user-tie"></i>
                    Funcionários
                </a>
            </li>

            <li>
                <a href="agendamento-lista.php">
                    <i class="fa-solid fa-calendar-days"></i>
                    Agendamentos
                </a>
            </li>

            <li>
                <a href="servicos-lista.php">
                    <i class="fa-solid fa-scissors"></i>
                    Serviços
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-box"></i>
                    Produtos
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Vendas
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    Financeiro
                </a>
            </li>

        </ul>

    </aside>

    <!-- CONTEÚDO -->

    <main class="conteudo">

        <!-- TOPO -->

        <div class="topo">

            <div class="titulo-dashboard">
                <h1>Olá, Isabela 👋</h1>

                <p>
                    Bem-vinda ao painel da Oficina de Beleza
                </p>
            </div>

            <div class="perfil">

                <div class="icone-topo">
                    <i class="fa-solid fa-bell"></i>
                </div>

                <div class="avatar">
                    IM
                </div>

            </div>

        </div>

        <!-- CARDS -->

        <div class="row g-4 mb-4">

            <div class="col-md-6 col-xl-3">

                <div class="card-dashboard bg-white">

                    <div class="icone-card bg-clientes">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div class="numero-card">
                        1.245
                    </div>

                    <div class="texto-card">
                        Clientes cadastrados
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-xl-3">

                <div class="card-dashboard bg-white">

                    <div class="icone-card bg-agenda">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <div class="numero-card">
                        28
                    </div>

                    <div class="texto-card">
                        Agendamentos hoje
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-xl-3">

                <div class="card-dashboard bg-white">

                    <div class="icone-card bg-vendas">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>

                    <div class="numero-card">
                        R$ 2.450
                    </div>

                    <div class="texto-card">
                        Faturamento do dia
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-xl-3">

                <div class="card-dashboard bg-white">

                    <div class="icone-card bg-produtos">
                        <i class="fa-solid fa-box"></i>
                    </div>

                    <div class="numero-card">
                        86
                    </div>

                    <div class="texto-card">
                        Produtos em estoque
                    </div>

                </div>

            </div>

        </div>

        <!-- TABELAS -->

        <div class="row g-4">

            <!-- AGENDA -->

            <div class="col-lg-8">

                <div class="card-tabela">

                    <h3 class="titulo-secao">
                        Agenda do Dia
                    </h3>

                    <table>

                        <thead>

                            <tr>
                                <th>Horário</th>
                                <th>Cliente</th>
                                <th>Serviço</th>
                                <th>Funcionário</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>09:00</td>
                                <td>Maria Silva</td>
                                <td>Escova</td>
                                <td>Ana</td>
                            </tr>

                            <tr>
                                <td>10:30</td>
                                <td>Fernanda</td>
                                <td>Manicure</td>
                                <td>Juliana</td>
                            </tr>

                            <tr>
                                <td>14:00</td>
                                <td>Camila</td>
                                <td>Progressiva</td>
                                <td>Patrícia</td>
                            </tr>

                            <tr>
                                <td>16:00</td>
                                <td>Bruna</td>
                                <td>Corte</td>
                                <td>Beatriz</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- META -->

            <div class="col-lg-4">

                <div class="meta">

                    <h3>
                        Meta do mês
                    </h3>

                    <h1 class="mt-4">
                        R$ 10.000
                    </h1>

                    <p>
                        76% da meta concluída
                    </p>

                    <div class="barra">
                        <div class="progresso"></div>
                    </div>

                    <div class="mt-4">
                        Continue assim 🚀
                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>