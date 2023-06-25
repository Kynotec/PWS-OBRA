-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Jun-2023 às 23:55
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
  `designacaosocial` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
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
(1, 'Obras & Companhia.LDA', 'obras@outlook.pt', 244830010, 123456789, 'Rua General Norton de Matos', '2411-901', 'Leiria', 100000);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `folha_obras`
--

INSERT INTO `folha_obras` (`id`, `data`, `valortotal`, `ivatotal`, `subtotal`, `estado`, `cliente_id`, `funcionario_id`) VALUES
(2, '2023-06-24 21:31:58', '97.76', '13.72', '84.04', 'Emitida', 3, 1),
(3, '2023-06-25 00:13:11', '0.00', '0.00', '0.00', 'Em Lançamento', 4, 1),
(4, '2023-06-25 00:15:57', '21.30', '3.98', '17.32', 'Emitida', 3, 1),
(6, '2023-06-25 23:11:48', '17.75', '3.32', '14.43', 'Emitida', 5, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(1, 23, 'Taxa Normal', 1),
(2, 13, 'Taxa Intermédia', 1),
(3, 6, 'Taxa Reduzida', 1),
(4, 0, 'Taxa Nula', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `linha_obras`
--

INSERT INTO `linha_obras` (`id`, `quantidade`, `valorunitario`, `valoriva`, `valortotal`, `folha_obra_id`, `servico_id`) VALUES
(6, '2.00', 11.00, 1.32, '23.32', 2, 1),
(7, '3.00', 14.43, 9.96, '53.25', 2, 3),
(8, '1.00', 18.75, 2.44, '21.19', 2, 4),
(9, '2.00', 14.43, 4.98, '26.62', 3, 3),
(10, '1.00', 14.43, 3.98, '21.30', 4, 3),
(20, '1.00', 14.43, 3.32, '17.75', 6, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `descricao`, `precohora`, `ativo`, `iva_id`) VALUES
(1, '1', 'Pintura', 11.00, 1, 3),
(2, '2', 'Canalização', 12.50, 1, 1),
(3, '3', 'Bate-Chapas', 14.39, 1, 1),
(4, '4', 'Mecânica', 18.75, 1, 2),
(5, '5', 'Montagem de Ar-Condicionado', 8.00, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`, `ativo`) VALUES
(1, 'administrador', 'admin', 'admin@outlook.pt', '919191911', '123456654', 'Rua da Prisão', '2410-887', 'Leiria', 'administrador', 1),
(2, 'funcionario', 'funcionario', 'funcionario@outlook.pt', '915478487', '987548752', 'Colmeias', '2420-173', 'Leiria', 'funcionario', 1),
(3, 'cliente', 'cliente', 'cliente@outlook.pt', '936587485', '587489620', 'Matos da Ranha', '3105-458', 'Pombal', 'cliente', 1),
(4, 'antonio', 'antonio', 'antonio@outlook.pt', '925478457', '555544478', '2410-007', '2410-777', 'Leiria', 'cliente', 0),
(5, 'alexandre', 'alexandre', 'alexandre@outlook.pt', '915478485', '985784225', 'Rua da Igreja, Carnide', '3104-874', 'Pombal', 'cliente', 1),
(6, 'luis', 'luis', 'luis@outlook.pt', '965874859', '985752000', 'Ceira', '3030-848', 'Coimbra', 'funcionario', 1);

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
