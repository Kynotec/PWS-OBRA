-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Jun-2023 às 02:33
-- Versão do servidor: 8.0.33
-- versão do PHP: 8.1.0

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
  `designacaosocial` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codigopostal` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localidade` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capitalsocial` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(2, 'instituação do scam', 'camgang@gmail.com', 312321213, 111111111, 'scam again 2', '0000-000', 'scam ipl 2', 0);

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
  `estado` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cliente_id` int NOT NULL,
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, '2023-06-14 22:04:36', 0, 0, 0, 'Pago', 2, 1),
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
(34, '2023-06-17 15:50:02', 0, 0, 0, 'Em Lançamento', 2, 1),
(35, '2023-06-17 17:00:41', 0, 0, 0, 'Emitida', 3, 1),
(36, '2023-06-17 17:03:50', 0, 0, 0, 'Em Lançamento', 4, 1),
(37, '2023-06-17 17:10:34', 0, 0, 0, 'Em Lançamento', 3, 1),
(38, '2023-06-17 19:01:56', 0, 0, 0, 'Em Lançamento', 3, 1),
(39, '2023-06-17 19:08:06', 0, 0, 0, 'Em Lançamento', 3, 1),
(40, '2023-06-17 19:09:58', 0, 0, 0, 'Em Lançamento', 2, 1),
(41, '2023-06-17 19:40:26', 0, 0, 0, 'Em Lançamento', 2, 1),
(42, '2023-06-17 20:40:46', 0, 0, 0, 'Em Lançamento', 2, 1),
(43, '2023-06-17 20:50:49', 0, 0, 0, 'Em Lançamento', 4, 1),
(44, '2023-06-17 21:05:04', 0, 0, 0, 'Em Lançamento', 3, 1),
(45, '2023-06-17 22:25:43', 0, 0, 0, 'Em Lançamento', 4, 1),
(46, '2023-06-17 22:26:01', 0, 0, 0, 'Em Lançamento', 4, 1),
(47, '2023-06-17 22:26:34', 0, 0, 0, 'Em Lançamento', 4, 1),
(48, '2023-06-17 22:39:01', 0, 0, 0, 'Em Lançamento', 2, 1),
(49, '2023-06-17 23:22:54', 0, 0, 0, 'Em Lançamento', 2, 1),
(50, '2023-06-17 23:35:19', 0, 0, 0, 'Em Lançamento', 3, 1),
(51, '2023-06-17 23:37:08', 0, 0, 0, 'Em Lançamento', 3, 1),
(52, '2023-06-20 16:07:36', 0, 0, 0, 'Em Lançamento', 3, 1),
(54, '2023-06-20 23:54:13', 25.5, 0.5, 0, 'Em Lançamento', 3, 1),
(55, '2023-06-23 00:05:04', 0, 0, 0, 'Em Lançamento', 3, 1),
(58, '2023-06-23 01:29:14', 0, 0, 0, 'Em Lançamento', 3, 1),
(59, '2023-06-23 01:33:46', 0, 0, 0, 'Em Lançamento', 3, 1),
(62, '2023-06-23 01:38:59', 0, 0, 0, 'Em Lançamento', 3, 1),
(63, '2023-06-23 01:41:55', 0, 0, 0, 'Em Lançamento', 3, 1),
(64, '2023-06-23 01:47:41', 0, 0, 0, 'Em Lançamento', 3, 1),
(65, '2023-06-23 02:00:27', 0, 0, 0, 'Em Lançamento', 3, 1),
(66, '2023-06-23 02:00:55', 468.4, 48.4, 420, 'Emitida', 3, 1),
(67, '2023-06-23 02:31:39', 51000, 1000, 50000, 'Emitida', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` int NOT NULL,
  `descricao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emvigor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(1, 1, 'testee', 0),
(2, 12, 'admin', 0),
(3, 2, 'testee112', 1),
(4, 12, 'testee112', 1),
(5, 12, 'testee112', 1),
(6, 2, 'olaaa', 1),
(7, 12, 'dadad', 1),
(8, 12, 'empresa', 1),
(9, 20, 'mini o totó', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `linha_obras`
--

INSERT INTO `linha_obras` (`id`, `quantidade`, `valorunitario`, `valoriva`, `folha_obra_id`, `servico_id`) VALUES
(1, 1, 2, 0, 28, 1),
(2, 1, 1, 0, 29, 2),
(3, 1, 1, 0, 30, 2),
(5, 1, 2, 0, 30, 1),
(6, 1, 2, 0, 31, 1),
(7, 2, 1, 0, 31, 2),
(8, 2, 2, 0, 31, 1),
(9, 1, 2, 0, 32, 1),
(10, 3, 1, 0, 32, 2),
(14, 1, 2, 0, 34, 1),
(15, 1, 2, 0, 34, 1),
(16, 5, 5, 1, 36, 3),
(17, 1, 5, 1, 36, 3),
(18, 1, 5, 1, 38, 3),
(19, 1, 5, 1, 39, 3),
(20, 2, 5, 1, 39, 3),
(21, 1, 5, 1, 40, 3),
(22, 2, 5, 1, 40, 3),
(24, 2, 5, 1, 41, 3),
(26, 1, 5, 1, 41, 3),
(27, 4, 5, 1, 47, 3),
(28, 3, 5, 1, 47, 3),
(29, 2, 2, 0, 51, 1),
(34, 2, 5, 0, 54, 3),
(35, 3, 5, 0, 54, 3),
(47, 2, 5, 0, 58, 3),
(48, 1, 1, 0.12, 62, 2),
(49, 2, 5, 0.1, 66, 3),
(50, 400, 1, 0.12, 66, 2),
(51, 2, 5, 0.1, 66, 3),
(52, 10000, 5, 0.1, 67, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precohora` float NOT NULL,
  `iva_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `descricao`, `precohora`, `iva_id`) VALUES
(1, '1', 'Mini', 2, 3),
(2, '2', 'bANANAS', 1, 4),
(3, '1231231', 'pá', 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` char(9) COLLATE utf8mb4_general_ci NOT NULL,
  `nif` char(9) COLLATE utf8mb4_general_ci NOT NULL,
  `morada` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigopostal` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localidade` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`, `ativo`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '911111111', '989898989', 'blaa blaa bla', '3132-132', '', 'administrador', 1),
(2, 'ola luis momo min', 'ola', 'ola@gmai.com', '123123123', '123123123', 'ola', '3100-878', 'llld', 'funcionario', 1),
(3, 'ola', 'ola', 'ola@2gmai.com', '321231421', '999999999', 'ola', '3100-878', 'Matos da Ranha', 'cliente', 1),
(4, 'ola luis', 'ola', 'ola1@gmai.com', '999999999', '455335156', 'ola fffff', '3100-878', 'Matos da Ranha111', 'funcionario', 1),
(5, 'func lis', 'func', 'func@gmail.com', '123123123', '123123121', '*', '3100-888', 'daadadadadadad', 'funcionario', 1),
(6, 'mini func', 'mini', 'mini@gmail.com', '999999999', '431431252', 'ddd', '3100-888', 'leiria', 'funcionario', 1),
(11, 'zeeeee', 'zeeeeee', 'zemanu2el@gmail.com', '983123123', '908312312', 'dadad', '3123-000', 'dadadad', 'funcionario', 1),
(12, 'adandand', 'dandnandn', 'adjandha@gmai.com', '312312312', '312314123', 'dakdiaidi', '3212-012', 'adada', 'funcionario', 0),
(13, 'aodoadoad', 'adadadhahdh', 'dadadm@gmial.com', '321321444', '391923812', 'dadjajdj', '3132-000', 'leiria', 'funcionario', 1),
(14, 'dajdahdh', '', 'dahdhad@gmail.com', '123123123', '498310837', 'moaradadad', '0912-093', 'adoado', 'funcionario', 1),
(15, 'zemanel', 'zemanel', 'zemanel@gmail.com', '321234531', '982739183', 'moraa', '1234-012', 'dada', 'funcionario', 1);

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
