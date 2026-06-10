-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_oficina_beleza
CREATE DATABASE IF NOT EXISTS `db_oficina_beleza` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_oficina_beleza`;

-- Copiando estrutura para tabela db_oficina_beleza.tb_agendamento
CREATE TABLE IF NOT EXISTS `tb_agendamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `hora` time NOT NULL DEFAULT current_timestamp(),
  `valor` decimal(10,2) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_id_funcionario` (`id_funcionario`),
  KEY `fk_id_servico` (`id_servico`),
  CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servico` FOREIGN KEY (`id_servico`) REFERENCES `tb_servico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_agendamento: ~5 rows (aproximadamente)
INSERT INTO `tb_agendamento` (`id`, `id_cliente`, `id_funcionario`, `id_servico`, `data`, `hora`, `valor`, `ativo`) VALUES
	(2, 3, 5, 3, '2026-06-01', '16:04:43', 50.00, -1),
	(3, 1, 4, 3, '2026-06-04', '14:00:00', 50.00, 1),
	(4, 1, 1, 3, '2026-06-02', '18:13:00', 0.00, 1),
	(5, 4, 4, 2, '2026-06-04', '15:50:00', 70.00, 1),
	(6, 4, 3, 6, '2026-06-03', '16:50:00', 180.00, 1),
	(7, 3, 7, 6, '2026-06-09', '16:00:00', 180.00, 1);

-- Copiando estrutura para tabela db_oficina_beleza.tb_cliente
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_cliente: ~4 rows (aproximadamente)
INSERT INTO `tb_cliente` (`id`, `nome`, `data_nascimento`, `endereco`, `email`, `telefone`, `cidade`, `estado`, `data_cadastro`, `ativo`) VALUES
	(1, 'Vagner Costa Souza', '1986-01-19', 'Rua: João da Silva', 'vagnersouza@gmail.com', '(19) 99656-2544', 'São João da Boa Vista', 'Santa Catarina', '2026-05-20 00:00:00', 1),
	(2, 'Júlio Cesar Rodrigues', '2011-03-12', 'Rua: João da Silva Souza', 'juliocesar@gmail.com', '19987964587', 'São João da Boa Vista', 'São Paulo', '2026-05-20 00:00:00', 0),
	(3, 'Vanessa Macleine Junqueira Ferreira', '1985-01-19', 'Rua: Dom Pedro II, 30', 'vanessamacleinesenac@gmail.com', '19991879645', 'São João da Boa Vista', 'São Paulo', '2026-06-01 00:00:00', 0),
	(4, 'Carla Beatriz Silva', '2020-04-01', 'Bernadino de Campos,448', 'carlabe@gmail.com', '981846242', 'São João da Boa Vista', 'Lindóia', '2026-06-02 00:00:00', 0);

-- Copiando estrutura para tabela db_oficina_beleza.tb_formas_pagamento
CREATE TABLE IF NOT EXISTS `tb_formas_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_formas_pagamento: ~7 rows (aproximadamente)
INSERT INTO `tb_formas_pagamento` (`id`, `nome`, `status`, `data_hora`) VALUES
	(1, 'Pix', 1, '2026-06-10 14:27:46'),
	(2, 'Dinheiro', 1, '2026-06-10 14:27:46'),
	(3, 'Cartão Crédito', 1, '2026-06-10 14:27:46'),
	(4, 'Cartão Débito', 1, '2026-06-10 14:27:46'),
	(5, 'Pix', 1, '2026-06-10 16:27:23'),
	(6, 'Cartão', 1, '2026-06-10 16:27:23'),
	(7, 'Dinheiro', 1, '2026-06-10 16:27:23');

-- Copiando estrutura para tabela db_oficina_beleza.tb_funcionario
CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `token` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_funcionario: ~5 rows (aproximadamente)
INSERT INTO `tb_funcionario` (`id`, `nome`, `email`, `telefone`, `senha`, `token`, `data_cadastro`, `ativo`) VALUES
	(1, 'Vagner Costa Souza', 'vagnersouza@gmail.com', '(19) 99656-2545', '', '', '2026-05-08 15:03:12', 0),
	(3, 'Júlio Cesar Rodrigues', 'juliocesar@gmail.com', '19987964587', '', '', '2026-05-08 15:21:30', 1),
	(4, 'Maria Luiza Santos Oliveira', 'marialulu@hotmail.com', '19992364565', '', '', '2026-05-08 15:30:08', 1),
	(5, 'Julia Lima Souza', 'julialima@gmail.com', '19993652412', '', '', '2026-05-08 15:31:30', 1),
	(7, 'Maria Luiza Santos Oliveira', 'juju@gmail.com', '19987964583', '', '', '2026-05-20 15:40:32', 1);

-- Copiando estrutura para tabela db_oficina_beleza.tb_login
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_login: ~2 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `ativo`) VALUES
	(1, 'Isabela Macedo', 'isabelamacedo@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Znp3emduU0ZmZ3ZwRTVPRA$xk772zPJ6SzC41lVa1kScVxLUwgQEwv7teBj0B0aMeE', '2026-06-02 15:21:58', 1),
	(2, 'Vanessa Macleine', 'vanessa123@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eE1NUkZHNU1wLkVzM0ZBaQ$ou35c20DN4mVPwHDOTf6OisvNH56F6pGgusUiYizzNE', '2026-06-02 15:29:05', 1);

-- Copiando estrutura para tabela db_oficina_beleza.tb_meta
CREATE TABLE IF NOT EXISTS `tb_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_meta: ~11 rows (aproximadamente)
INSERT INTO `tb_meta` (`id`, `valor`, `data_cadastro`) VALUES
	(1, 5.00, '2026-06-09 15:48:53'),
	(2, 5.00, '2026-06-09 15:48:56'),
	(3, 5000.00, '2026-06-09 15:49:23'),
	(4, 60000.00, '2026-06-09 15:52:22'),
	(5, 6000.00, '2026-06-09 15:52:32'),
	(6, 6000.00, '2026-06-09 15:53:23'),
	(7, 600.00, '2026-06-09 15:53:38'),
	(8, 600.00, '2026-06-09 15:53:53'),
	(9, 6000.00, '2026-06-09 15:54:08'),
	(10, 600.00, '2026-06-09 15:55:03'),
	(11, 6000.00, '2026-06-09 15:55:15'),
	(12, 600.00, '2026-06-09 15:56:04'),
	(13, 600.00, '2026-06-09 15:56:43');

-- Copiando estrutura para tabela db_oficina_beleza.tb_pedido
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,2) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `id_cliente` int(11) NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL,
  `desconto` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `fk_id_clientes` (`id_cliente`),
  KEY `fk_id_forma_pagamento` (`id_forma_pagamento`),
  CONSTRAINT `fk_id_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_forma_pagamento` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `tb_formas_pagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_pedido: ~11 rows (aproximadamente)
INSERT INTO `tb_pedido` (`id`, `valor_total`, `data_hora`, `status`, `id_cliente`, `id_forma_pagamento`, `desconto`) VALUES
	(1, 565.00, '2026-06-10 15:18:11', 1, 1, 1, 0.00),
	(2, 500.00, '2026-06-10 15:21:26', 1, 4, 1, 0.00),
	(3, 65.00, '2026-06-10 15:22:49', 1, 1, 1, 0.00),
	(4, 500.00, '2026-06-10 15:25:11', 1, 1, 1, 0.00),
	(5, 45.00, '2026-06-10 15:29:56', 1, 2, 1, 0.00),
	(6, 45.00, '2026-06-10 15:32:08', 1, 2, 1, 0.00),
	(7, 65.00, '2026-06-10 15:55:16', 1, 4, 1, 0.00),
	(8, 500.00, '2026-06-10 16:01:00', 1, 2, 1, 0.00),
	(9, 500.00, '2026-06-10 16:04:02', 1, 1, 1, 0.00),
	(10, 5000.00, '2026-06-10 16:14:38', 1, 3, 1, 0.00),
	(11, 500.00, '2026-06-10 16:28:19', 1, 2, 1, 0.00),
	(12, 110.00, '2026-06-10 16:48:09', 1, 2, 4, 0.00),
	(13, 65.00, '2026-06-10 17:16:11', 1, 4, 1, 0.00);

-- Copiando estrutura para tabela db_oficina_beleza.tb_produto
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `categoria` enum('Cabelo','Unha','Estética') NOT NULL,
  `preco_custo` decimal(10,2) NOT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `estoque_atual` decimal(10,2) NOT NULL,
  `estoque_minimo` decimal(10,2) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_produto: ~3 rows (aproximadamente)
INSERT INTO `tb_produto` (`id`, `nome`, `marca`, `categoria`, `preco_custo`, `preco_venda`, `estoque_atual`, `estoque_minimo`, `data_cadastro`, `ativo`) VALUES
	(1, 'Shampoo', 'Yellow', 'Cabelo', 35.00, 45.00, 49.00, 5.00, '2026-05-15 13:53:43', 1),
	(2, 'Condicionador', 'Lowel', 'Cabelo', 45.00, 65.00, 7.00, 3.00, '2026-05-20 13:51:28', 1),
	(8, 'Chapa', 'Lizz', 'Cabelo', 300.00, 500.00, 39.00, 1.00, '2026-05-20 15:39:04', 1);

-- Copiando estrutura para tabela db_oficina_beleza.tb_produtos_pedido
CREATE TABLE IF NOT EXISTS `tb_produtos_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_id_pedido` (`id_pedido`),
  KEY `fk_id_produto` (`id_produto`),
  CONSTRAINT `fk_id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_produtos_pedido: ~14 rows (aproximadamente)
INSERT INTO `tb_produtos_pedido` (`id`, `id_pedido`, `id_produto`, `quantidade`, `data_hora`) VALUES
	(1, 1, 2, 1, '2026-06-10 15:18:11'),
	(2, 1, 8, 1, '2026-06-10 15:18:11'),
	(3, 2, 8, 1, '2026-06-10 15:21:26'),
	(4, 3, 2, 1, '2026-06-10 15:22:49'),
	(5, 4, 8, 1, '2026-06-10 15:25:11'),
	(6, 5, 1, 1, '2026-06-10 15:29:56'),
	(7, 6, 1, 1, '2026-06-10 15:32:08'),
	(8, 7, 2, 1, '2026-06-10 15:55:16'),
	(9, 8, 8, 1, '2026-06-10 16:01:00'),
	(10, 9, 8, 1, '2026-06-10 16:04:02'),
	(11, 10, 8, 10, '2026-06-10 16:14:38'),
	(12, 11, 8, 1, '2026-06-10 16:28:19'),
	(13, 12, 2, 1, '2026-06-10 16:48:09'),
	(14, 12, 1, 1, '2026-06-10 16:48:09'),
	(15, 13, 2, 1, '2026-06-10 17:16:11');

-- Copiando estrutura para tabela db_oficina_beleza.tb_servico
CREATE TABLE IF NOT EXISTS `tb_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `duracao` varchar(50) NOT NULL,
  `categoria` enum('Cabelo','Unha','Sobrancelha','Maquiagem') NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_servico: ~4 rows (aproximadamente)
INSERT INTO `tb_servico` (`id`, `nome_servico`, `descricao`, `preco`, `duracao`, `categoria`, `data_cadastro`, `ativo`) VALUES
	(2, 'Escova', 'Escova Definitiva', 10.00, '1 hora', 'Cabelo', '2026-05-13 15:02:27', 1),
	(3, 'Corte', 'Corte Feminino', 10.00, '1 hora', 'Cabelo', '2026-05-13 15:02:31', 1),
	(6, 'Unha de Gel', 'Definitiva', 50.00, '2 horas', 'Unha', '2026-05-13 15:25:41', 1),
	(7, 'Corte', 'Corte Masculino', 35.00, '0:30 min', 'Cabelo', '2026-05-13 16:54:13', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
