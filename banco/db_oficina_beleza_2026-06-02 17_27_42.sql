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
  `status` enum('Cancelar','Confirmar','Concluído') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_id_funcionario` (`id_funcionario`),
  KEY `fk_id_servico` (`id_servico`),
  CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servico` FOREIGN KEY (`id_servico`) REFERENCES `tb_servico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_agendamento: ~4 rows (aproximadamente)
INSERT INTO `tb_agendamento` (`id`, `id_cliente`, `id_funcionario`, `id_servico`, `data`, `hora`, `valor`, `status`) VALUES
	(2, 3, 5, 3, '2026-06-01', '16:04:43', 50.00, 'Confirmar'),
	(3, 1, 4, 3, '2026-06-04', '14:00:00', 50.00, 'Cancelar'),
	(4, 1, 1, 3, '2026-06-02', '18:13:00', 0.00, 'Cancelar'),
	(5, 4, 4, 2, '2026-06-04', '15:50:00', 70.00, 'Cancelar');

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
  `status` enum('ativo','inativo') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_cliente: ~4 rows (aproximadamente)
INSERT INTO `tb_cliente` (`id`, `nome`, `data_nascimento`, `endereco`, `email`, `telefone`, `cidade`, `estado`, `data_cadastro`, `status`) VALUES
	(1, 'Vagner Costa Souza', '1986-01-19', 'Rua: João da Silva', 'vagnersouza@gmail.com', '(19) 99656-2544', 'São João da Boa Vista', 'São Paulo', '2026-05-20 00:00:00', ''),
	(2, 'Júlio Cesar Rodrigues', '2011-03-12', 'Rua: João da Silva Souza', 'juliocesar@gmail.com', '19987964587', 'São João da Boa Vista', 'São Paulo', '2026-05-20 00:00:00', 'ativo'),
	(3, 'Vanessa Macleine Junqueira Ferreira', '1985-01-19', 'Rua: Dom Pedro II, 30', 'vanessamacleinesenac@gmail.com', '19991879645', 'São João da Boa Vista', 'São Paulo', '2026-06-01 00:00:00', 'ativo'),
	(4, 'Carla Beatriz Silva', '2020-04-01', 'Bernadino de Campos,448', 'carlabe@gmail.com', '981846242', 'São João da Boa Vista', 'São Paulo', '2026-06-02 00:00:00', 'ativo');

-- Copiando estrutura para tabela db_oficina_beleza.tb_formas_pagamento
CREATE TABLE IF NOT EXISTS `tb_formas_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_formas_pagamento: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_login: ~1 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `ativo`) VALUES
	(1, 'Vagner Costa Souza', 'vagnersouza@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$aVVlLm1LQ2hQSGtxWHJDUw$2VfgQ3iSeqOZ+AueDGQQD1IHvzVS+iNtCJ3abjeNZgE', '2026-06-02 15:36:36', 1);

-- Copiando estrutura para tabela db_oficina_beleza.tb_pedido
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,2) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `id_cliente` int(11) NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_clientes` (`id_cliente`),
  KEY `fk_id_forma_pagamento` (`id_forma_pagamento`),
  CONSTRAINT `fk_id_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_forma_pagamento` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `tb_formas_pagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_pedido: ~0 rows (aproximadamente)

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
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_produto: ~3 rows (aproximadamente)
INSERT INTO `tb_produto` (`id`, `nome`, `marca`, `categoria`, `preco_custo`, `preco_venda`, `estoque_atual`, `estoque_minimo`, `data_cadastro`, `status`) VALUES
	(1, 'Shampoo', 'Yellow', 'Cabelo', 35.00, 45.00, 10.00, 5.00, '2026-05-15 13:53:43', 'ativo'),
	(2, 'Condicionador', 'Lowel', 'Cabelo', 45.00, 65.00, 12.00, 3.00, '2026-05-20 13:51:28', 'ativo'),
	(8, 'Chapa', 'Lizz', 'Cabelo', 300.00, 500.00, 2.00, 1.00, '2026-05-20 15:39:04', 'ativo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_produtos_pedido: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_oficina_beleza.tb_servico
CREATE TABLE IF NOT EXISTS `tb_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `duracao` varchar(50) NOT NULL,
  `categoria` enum('Cabelo','Unha','Sobrancelha','Maquiagem') NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_oficina_beleza.tb_servico: ~4 rows (aproximadamente)
INSERT INTO `tb_servico` (`id`, `nome_servico`, `descricao`, `preco`, `duracao`, `categoria`, `data_cadastro`, `status`) VALUES
	(2, 'Escova', 'Escova Definitiva', 10.00, '1 hora', 'Cabelo', '2026-05-13 15:02:27', 'ativo'),
	(3, 'Corte', 'Corte Feminino', 10.00, '1 hora', 'Cabelo', '2026-05-13 15:02:31', 'ativo'),
	(6, 'Unha de Gel', 'Definitiva', 50.00, '2 horas', 'Unha', '2026-05-13 15:25:41', 'ativo'),
	(7, 'Corte', 'Corte Masculino', 35.00, '0:30 min', 'Cabelo', '2026-05-13 16:54:13', 'ativo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
