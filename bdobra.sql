-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Jun-2023 às 15:58
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdobra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(40) DEFAULT NULL,
  `codigopostal` varchar(8) DEFAULT NULL,
  `localidade` varchar(40) DEFAULT NULL,
  `capitalsocial` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'Instituto Leiria', '2500', 0, 244000000, '505000000', 'Rua Imag', '2400-000', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folha_obras`
--

DROP TABLE IF EXISTS `folha_obras`;
CREATE TABLE IF NOT EXISTS `folha_obras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valortotal` float NOT NULL,
  `ivatotal` float NOT NULL,
  `subtotal` float NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cliente_id` int NOT NULL,
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `folha_obras`
--

INSERT INTO `folha_obras` (`id`, `data`, `valortotal`, `ivatotal`, `subtotal`, `estado`, `cliente_id`, `funcionario_id`) VALUES
(1, '2023-06-10 22:39:33', 0, 0, 0, 'Em Lançamento', 2, 1),
(2, '2023-06-10 22:40:24', 0, 0, 0, 'Em Lançamento', 3, 1),
(3, '2023-06-13 19:01:56', 0, 0, 0, 'Em Lançamento', 2, 1),
(6, '2023-06-14 20:56:18', 0, 0, 0, 'Em Lançamento', 3, 1),
(8, '2023-06-14 21:38:46', 0, 0, 0, 'Em Lançamento', 2, 1),
(10, '2023-06-14 21:51:49', 0, 0, 0, 'Em Lançamento', 2, 1),
(11, '2023-06-14 22:04:36', 0, 0, 0, 'Em Lançamento', 2, 1),
(14, '2023-06-14 22:33:45', 0, 0, 0, 'Em Lançamento', 2, 1),
(15, '2023-06-14 22:34:03', 0, 0, 0, 'Em Lançamento', 3, 1),
(17, '2023-06-15 18:12:30', 0, 0, 0, 'Em Lançamento', 2, 1),
(18, '2023-06-15 18:14:19', 0, 0, 0, 'Em Lançamento', 2, 1),
(19, '2023-06-15 18:38:18', 0, 0, 0, 'Em Lançamento', 2, 1),
(21, '2023-06-15 18:43:57', 0, 0, 0, 'Em Lançamento', 2, 1),
(22, '2023-06-15 18:47:28', 0, 0, 0, 'Em Lançamento', 2, 1),
(23, '2023-06-15 18:49:12', 0, 0, 0, 'Em Lançamento', 2, 1),
(25, '2023-06-15 19:19:19', 0, 0, 0, 'Em Lançamento', 2, 1),
(26, '2023-06-15 22:26:18', 0, 0, 0, 'Em Lançamento', 2, 1),
(27, '2023-06-15 22:32:54', 0, 0, 0, 'Em Lançamento', 2, 1),
(28, '2023-06-16 08:33:07', 0, 0, 0, 'Em Lançamento', 2, 1),
(29, '2023-06-16 08:54:00', 0, 0, 0, 'Em Lançamento', 4, 1),
(30, '2023-06-16 08:57:29', 0, 0, 0, 'Em Lançamento', 2, 1),
(31, '2023-06-16 09:08:30', 0, 0, 0, 'Em Lançamento', 2, 1),
(32, '2023-06-16 09:20:05', 0, 0, 0, 'Em Lançamento', 2, 1),
(34, '2023-06-17 15:50:02', 0, 0, 0, 'Em Lançamento', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` int NOT NULL,
  `descricao` varchar(10) NOT NULL,
  `emvigor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(1, 1, 'testee', 0),
(2, 12, 'admin', 0),
(3, 12, 'testee112', 1),
(4, 12, 'testee112', 1),
(5, 12, 'testee112', 1),
(6, 12, 'olaaa', 1),
(7, 12, 'dadad', 1),
(8, 12, 'empresa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_obras`
--

DROP TABLE IF EXISTS `linha_obras`;
CREATE TABLE IF NOT EXISTS `linha_obras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` int NOT NULL,
  `valorunitario` float NOT NULL,
  `valoriva` float NOT NULL,
  `folha_obra_id` int NOT NULL,
  `servico_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_id` (`servico_id`),
  KEY `folha_obra_id` (`folha_obra_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linha_obras`
--

INSERT INTO `linha_obras` (`id`, `quantidade`, `valorunitario`, `valoriva`, `folha_obra_id`, `servico_id`) VALUES
(1, 1, 2, 0, 28, 1),
(2, 1, 1, 0.12, 29, 2),
(3, 1, 1, 0.12, 30, 2),
(5, 1, 2, 0.24, 30, 1),
(6, 1, 2, 0.24, 31, 1),
(7, 2, 1, 0.12, 31, 2),
(8, 2, 2, 0.24, 31, 1),
(9, 1, 2, 0.24, 32, 1),
(10, 3, 1, 0.12, 32, 2),
(14, 1, 2, 0.24, 34, 1),
(15, 1, 2, 0.24, 34, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `precohora` float NOT NULL,
  `iva_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `descricao`, `precohora`, `iva_id`) VALUES
(1, '1', 'Mini', 2, 3),
(2, '2', 'bANANAS', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `codigopostal` varchar(8) DEFAULT NULL,
  `localidade` varchar(40) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`, `ativo`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 911111111, 989898989, 'blaa blaa bla', '3132-132', NULL, 'administrador', 1),
(2, 'ola luis momo min', 'ola', 'ola@gmai.com', 999999999, 999999999, 'ola', '3100-878', 'llld', 'cliente', 0),
(3, 'ola', 'ola', 'ola@gmai.com', 999999999, 999999999, 'ola', '3100-878', 'Matos da Ranha', 'cliente', 1),
(4, 'ola luis', 'ola', 'ola@gmai.com', 999999999, 999999999, 'ola fffff', '3100-878', 'Matos da Ranha111', 'cliente', 1),
(5, 'func lis', 'func', 'func@gmail.com', 999999999, 999999999, '*', '3100-888', 'dd', 'funcionario', 1),
(6, 'mini func', 'mini', 'mini@gmail.com', 999999999, 999999999, 'ddd', '3100-888', 'leiria', 'funcionario', 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `folha_obras`
--
ALTER TABLE `folha_obras`
  ADD CONSTRAINT `folha_obras_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `folha_obras_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `linha_obras`
--
ALTER TABLE `linha_obras`
  ADD CONSTRAINT `linha_obras_ibfk_1` FOREIGN KEY (`folha_obra_id`) REFERENCES `folha_obras` (`id`),
  ADD CONSTRAINT `linha_obras_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
