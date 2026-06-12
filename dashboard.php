<?php

require_once 'consulta-dashboard.php';
require_once 'backend/verifica-login.php';

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$nomeUsuario = $_SESSION['nome'];
$partes = explode(' ', $nomeUsuario);
$iniciais = strtoupper(substr($partes[0], 0, 1));

if (count($partes) > 1) {
    $iniciais .= strtoupper(substr($partes[1], 0, 1));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Oficina de Beleza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================
            SIDEBAR
        ==========================*/

        .sidebar {
            width: 270px;
            height: 100vh;
            background: linear-gradient(180deg, #d63384, #ec407a);
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            z-index: 1000;
        }

        .logo {
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .menu {
            list-style: none;
            padding: 0;
        }

        .menu li {
            margin-bottom: 15px;
        }

        .menu a {
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

        .menu a:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .menu .ativo {
            background-color: white;
            color: #1565c0;
            font-weight: bold;
        }

        /* =========================
            CONTEÚDO
        ==========================*/

        .conteudo {
            margin-left: 270px;
            padding: 30px;
        }

        /* =========================
            TOPO
        ==========================*/

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .titulo-dashboard h1 {
            font-size: 35px;
            color: #1f2937;
            font-weight: bold;
        }

        .titulo-dashboard p {
            color: gray;
            font-size: 17px;
        }

        .perfil {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icone-topo {
            width: 45px;
            height: 45px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            cursor: pointer;
        }

        .avatar {
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

        .card-dashboard {
            border: none;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
        }

        .icone-card {
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

        .bg-clientes {
            background-color: #1565c0;
        }

        .bg-agenda {
            background-color: #8e24aa;
        }

        .bg-vendas {
            background-color: #2e7d32;
        }

        .bg-produtos {
            background-color: #ef6c00;
        }

        .numero-card {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
        }

        .texto-card {
            color: gray;
            font-size: 16px;
        }

        /* =========================
            TABELAS
        ==========================*/

        .card-tabela {
            background-color: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .titulo-secao {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #1f2937;
        }

        table {
            width: 100%;
        }

        th {
            color: gray;
            font-weight: 600;
            padding-bottom: 15px;
        }

        td {
            padding: 15px 0;
            border-top: 1px solid #eee;
        }

        /* =========================
            META
        ==========================*/

        .meta {
            background: linear-gradient(135deg, #1565c0, #42a5f5);
            color: white;
            border-radius: 20px;
            padding: 30px;
        }

        .barra {
            width: 100%;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .progresso {
            width: 76%;
            height: 100%;
            background-color: white;
        }

        /* =========================
            OFF-CANVAS MOBILE
        ==========================*/

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 999;
        }

        .overlay.ativo {
            display: block;
        }

        .btn-hamburguer {
            background: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 18px;
            color: #d63384;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .btn-fechar-menu {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            margin-left: auto;
        }

        /* =========================
            RESPONSIVO
        ==========================*/

        @media (max-width: 992px) {

            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.aberta {
                transform: translateX(0);
            }

            .conteudo {
                margin-left: 0;
            }

            .btn-hamburguer {
                display: flex;
            }

            .btn-fechar-menu {
                display: flex;
            }

            .titulo-dashboard h1 {
                font-size: 24px;
            }

            .titulo-dashboard p {
                font-size: 14px;
            }

        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" id="overlay"></div>

    <!-- SIDEBAR -->

    <aside class="sidebar" id="sidebar">

        <button class="btn-fechar-menu" id="btnFecharMenu" aria-label="Fechar menu">
            <i class="fa-solid fa-xmark"></i>
        </button>

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
                <a href="produtos-lista.php">
                    <i class="fa-solid fa-box"></i>
                    Produtos
                </a>
            </li>

            <li>
                <a href="pedidos.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Vendas
                </a>
            </li>

            <li>
                <a href="configuracoes.php">
                    <i class="fa-solid fa-gear"></i>
                    Configurações
                </a>
            </li>

            <li>
                <a href="sair.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </a>
            </li>

        </ul>

    </aside>

    <!-- CONTEÚDO -->

    <main class="conteudo">

        <!-- TOPO -->

        <div class="topo">

            <button class="btn-hamburguer" id="btnAbrirMenu" aria-label="Abrir menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="titulo-dashboard">
                <h1>Olá, <?= $nomeUsuario ?> 👋</h1>
                <p>Bem-vinda ao painel da Oficina de Beleza</p>
            </div>

            <div class="perfil">

                <div class="icone-topo">
                    <i class="fa-solid fa-bell"></i>
                </div>

                <div class="avatar">
                    <?= $iniciais ?>
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
                    <div class="numero-card"><?= $totalClientes['total'] ?></div>
                    <div class="texto-card">Clientes cadastrados</div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-dashboard bg-white">
                    <div class="icone-card bg-agenda">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="numero-card"><?= $totalAgendamentos['total'] ?></div>
                    <div class="texto-card">Agendamentos hoje</div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-dashboard bg-white">
                    <div class="icone-card bg-vendas">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                    <div class="numero-card">R$ <?= number_format($faturamentoDia['total'], 2, ',', '.') ?></div>
                    <div class="texto-card">Faturamento do dia</div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-dashboard bg-white">
                    <div class="icone-card bg-produtos">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <div class="numero-card"><?= number_format($totalEstoque['total'], 0, ',', '.') ?></div>
                    <div class="texto-card">Produtos em estoque</div>
                </div>
            </div>

        </div>

        <!-- TABELAS -->

        <div class="row g-4">

            <!-- AGENDA -->

            <div class="col-lg-8">
                <div class="card-tabela">

                    <h3 class="titulo-secao">Agenda do Dia</h3>

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
                            <?php if (!empty($agenda)): ?>
                                <?php foreach ($agenda as $item): ?>
                                    <tr>
                                        <td><?= date('H:i', strtotime($item['hora'])) ?></td>
                                        <td><?= $item['cliente'] ?></td>
                                        <td><?= $item['nome_servico'] ?></td>
                                        <td><?= $item['funcionario'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum agendamento encontrado.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- META -->

            <div class="col-lg-4">
                <div class="meta">

                    <h3>Meta do mês</h3>

                    <h1 class="mt-4">
                        R$ <?= number_format($metaMes, 2, ',', '.') ?>
                    </h1>

                    <p><?= round($percentualMeta) ?>% da meta concluída</p>

                    <div class="barra">
                        <div class="progresso" style="width: <?= $percentualMeta ?>%;"></div>
                    </div>

                    <div class="mt-4">Continue assim 🚀</div>

                </div>
            </div>

        </div>

    </main>

    <script>
        const sidebar    = document.getElementById('sidebar');
        const overlay    = document.getElementById('overlay');
        const btnAbrir   = document.getElementById('btnAbrirMenu');
        const btnFechar  = document.getElementById('btnFecharMenu');
        const linksMenu  = sidebar.querySelectorAll('.menu a');

        function abrirMenu() {
            sidebar.classList.add('aberta');
            overlay.classList.add('ativo');
            document.body.style.overflow = 'hidden';
        }

        function fecharMenu() {
            sidebar.classList.remove('aberta');
            overlay.classList.remove('ativo');
            document.body.style.overflow = '';
        }

        btnAbrir.addEventListener('click', abrirMenu);
        btnFechar.addEventListener('click', fecharMenu);
        overlay.addEventListener('click', fecharMenu);

        linksMenu.forEach(link => link.addEventListener('click', fecharMenu));
    </script>

</body>

</html>