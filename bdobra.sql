-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jun-2023 às 02:55
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
CREATE DATABASE bdobra;
use bdobra;
-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `morada` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codigopostal` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localidade` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capitalsocial` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'Obras & Companhia.LDA', 'obras@gmail.com', '928748548', '666555985', 'Rua General Norton de Matos', '2410-887', 'Leiria', 100000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folha_obras`
--

DROP TABLE IF EXISTS `folha_obras`;
CREATE TABLE IF NOT EXISTS `folha_obras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valortotal` decimal(10,2) NOT NULL,
  `ivatotal` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `estado` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cliente_id` int NOT NULL,
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `folha_obras`
--

INSERT INTO `folha_obras` (`id`, `data`, `valortotal`, `ivatotal`, `subtotal`, `estado`, `cliente_id`, `funcionario_id`) VALUES
(2, '2023-06-29 02:30:57', '48.73', '4.92', '43.81', 'Emitida', 4, 1),
(3, '2023-06-29 02:36:16', '185.55', '27.03', '158.52', 'Emitida', 5, 1),
(4, '2023-06-29 02:41:13', '76.63', '6.81', '69.82', 'Emitida', 6, 1),
(5, '2023-06-29 02:42:03', '89.96', '15.71', '74.25', 'Emitida', 5, 1),
(6, '2023-06-29 02:45:38', '0.00', '0.00', '0.00', 'Em Lançamento', 4, 1),
(7, '2023-06-29 02:51:31', '119.73', '15.83', '103.90', 'Paga', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emvigor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='1';

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(8, '23', 'Taxa Normal', 1),
(9, '13', 'Taxa Intermédia', 1),
(10, '6', 'Taxa Reduzida', 1),
(11, '0', 'Taxa Nula', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_obras`
--

DROP TABLE IF EXISTS `linha_obras`;
CREATE TABLE IF NOT EXISTS `linha_obras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(10,2) NOT NULL DEFAULT '1.00',
  `valorunitario` double(10,2) NOT NULL,
  `valoriva` double(10,2) NOT NULL,
  `valortotal` decimal(10,2) NOT NULL,
  `folha_obra_id` int NOT NULL,
  `servico_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_id` (`servico_id`),
  KEY `folha_obra_id` (`folha_obra_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `linha_obras`
--

INSERT INTO `linha_obras` (`id`, `quantidade`, `valorunitario`, `valoriva`, `valortotal`, `folha_obra_id`, `servico_id`) VALUES
(1, '1.20', 14.45, 2.25, '19.59', 2, 1),
(2, '1.00', 11.00, 0.66, '11.66', 2, 2),
(3, '1.30', 11.90, 2.01, '17.48', 2, 5),
(4, '8.00', 8.50, 15.64, '83.64', 3, 6),
(5, '2.50', 11.00, 1.65, '29.15', 3, 2),
(6, '4.00', 11.90, 6.19, '53.79', 3, 5),
(7, '1.00', 15.42, 3.55, '18.97', 3, 3),
(8, '4.00', 8.10, 1.94, '34.34', 4, 7),
(9, '2.00', 11.00, 1.32, '23.32', 4, 2),
(10, '1.00', 15.42, 3.55, '18.97', 4, 3),
(11, '3.00', 9.20, 6.35, '33.95', 5, 4),
(12, '2.50', 15.42, 8.87, '47.42', 5, 3),
(13, '1.00', 8.10, 0.49, '8.59', 5, 7),
(14, '1.00', 11.00, 0.66, '11.66', 6, 2),
(15, '1.00', 9.20, 2.12, '11.32', 6, 4),
(16, '1.00', 11.90, 1.55, '13.45', 6, 5),
(17, '3.00', 14.45, 5.64, '48.99', 7, 1),
(18, '2.00', 11.00, 1.32, '23.32', 7, 2),
(19, '2.50', 15.42, 8.87, '47.42', 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precohora` double(10,2) NOT NULL DEFAULT '1.00',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `iva_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `descricao`, `precohora`, `ativo`, `iva_id`) VALUES
(1, '1', 'Montagem de Ar-Condicionado', 14.45, 1, 9),
(2, '2', 'Eletrecidade', 11.00, 1, 10),
(3, '3', 'Canalização', 15.42, 1, 8),
(4, '4', 'Reboco Exterior', 9.20, 1, 8),
(5, '5', 'Pintura', 11.90, 1, 9),
(6, '6', 'Montagem de Cozinhas', 8.50, 1, 8),
(7, '7', 'Jardinagem', 8.10, 1, 10),
(8, '8', 'Decoração', 9.90, 0, 9);

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
  `telefone` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nif` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `morada` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigopostal` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localidade` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`, `ativo`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '928748758', '245187548', 'Rua da Igreja', '2400-875', 'Leiria', 'administrador', 1),
(2, 'funcionario1', 'funcionario1', 'funcionario1@gmail.com', '325478459', '245784589', 'Rua do Instituto Politécnico de Leiria', '2400-889', 'Leiria', 'funcionario', 1),
(3, 'funcionario2', 'funcionario2', 'funcionario2@gmail.com', '915478441', '321441257', 'Rua do Cardal', '3108-825', 'Pombal', 'funcionario', 1),
(4, 'diogo', 'diogo', 'diogo@gmail.com', '912541112', '925478556', 'Avenida 25 De Abril', '2400-855', 'Leiria', 'cliente', 1),
(5, 'luis', 'luis', 'luis@gmail.com', '965874875', '888556987', 'Estrada Da Estação', '2415-722', 'Leiria', 'cliente', 1),
(6, 'alexandre', 'alexandre', 'alexandre@gmail.com', '915478555', '555644128', 'Rua do Pinhal', '3000-130', 'Coimbra', 'cliente', 1),
(7, 'joaquim', 'joaquim', 'joaquim@gmail.com', '925478777', '777885425', 'Rua da Fé', '2450-893', 'Cortes', 'cliente', 0),
(8, 'funcionario3', 'funcionario3', 'funcionario3@gmail.com', '913235687', '632544598', 'Rua do Canto', '2451-875', 'Calvário', 'funcionario', 0);

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
