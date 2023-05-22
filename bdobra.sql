-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Maio-2023 às 17:37
-- Versão do servidor: 5.7.36
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `telefone` int(11) NOT NULL,
  `nif` int(11) NOT NULL,
  `morada` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `codigopostal` varchar(8) CHARACTER SET latin1 DEFAULT NULL,
  `localidade` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `capitalsocial` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'Papelaria Coelha, Ld', '2500', 0, 244000000, '505000000', 'Rua Imag', '2400-000', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folhaobras`
--

DROP TABLE IF EXISTS `folhaobras`;
CREATE TABLE IF NOT EXISTS `folhaobras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valortotal` float NOT NULL,
  `ivatotal` float NOT NULL,
  `estado` varchar(25) CHARACTER SET latin1 NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(11) DEFAULT NULL,
  `descricao` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `emvigor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhaobras`
--

DROP TABLE IF EXISTS `linhaobras`;
CREATE TABLE IF NOT EXISTS `linhaobras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `valorunitario` float NOT NULL,
  `valoriva` float NOT NULL,
  `folhaobra_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folhaobra_id` (`folhaobra_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `precohora` float NOT NULL,
  `taxaiva` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `taxaiva` (`taxaiva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nif` int(11) NOT NULL,
  `morada` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `codigopostal` varchar(8) CHARACTER SET latin1 DEFAULT NULL,
  `localidade` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `role` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `folhaobras`
--
ALTER TABLE `folhaobras`
  ADD CONSTRAINT `folhaobras_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `folhaobras_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `linhaobras`
--
ALTER TABLE `linhaobras`
  ADD CONSTRAINT `linhaobras_ibfk_1` FOREIGN KEY (`folhaobra_id`) REFERENCES `folhaobras` (`id`),
  ADD CONSTRAINT `linhaobras_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`taxaiva`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
