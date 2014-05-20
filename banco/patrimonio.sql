-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 17-Maio-2014 às 01:50
-- Versão do servidor: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `patrimonio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_bem`
--

CREATE TABLE `cadastro_bem` (
  `codigo_bem` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_bem` varchar(200) DEFAULT NULL,
  `valor_nominal` decimal(5,2) NOT NULL,
  `taxa_depreciacao` decimal(2,2) DEFAULT NULL,
  `codigo_localizacao_autal` varchar(20) NOT NULL,
  `codigo_localizacao_anterior` varchar(20) NOT NULL,
  `data_entrada` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `situacao_bem` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_bem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_departamento`
--

CREATE TABLE `cadastro_departamento` (
  `codigo_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_departamento` varchar(100) NOT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL,
  `nivel` varchar(20) NOT NULL,
  `fk_codigo_empresa` int(11) NOT NULL,
  PRIMARY KEY (`codigo_departamento`),
  KEY `fk_codigo_empresa` (`fk_codigo_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_empresa`
--

CREATE TABLE `cadastro_empresa` (
  `codigo_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) NOT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL,
  `tipo` int(2) NOT NULL,
  `responsavel` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cadastro_empresa`
--

INSERT INTO `cadastro_empresa` (`codigo_empresa`, `razao_social`, `numero`, `rua`, `bairro`, `cidade`, `latitude`, `longitude`, `tipo`, `responsavel`) VALUES
(1, 'On The Line S/A', NULL, 'Rua Doutor Marcos Pessoa Guerra', 'Capibaribe', 'São Lourenço da Mata', NULL, NULL, 1, 'Estefano Emanoel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_movimentacao`
--

CREATE TABLE `cadastro_movimentacao` (
  `codigo_movimentacao` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_localizacao_autal` varchar(20) NOT NULL,
  `codigo_localizacao_anterior` varchar(20) NOT NULL,
  `data_movimentacao` date NOT NULL,
  `fk_codigo_empresa` int(11) NOT NULL,
  `fk_codigo_usuario` int(11) NOT NULL,
  `fk_codigo_departamento` int(11) NOT NULL,
  `fk_codigo_bem` int(11) NOT NULL,
  PRIMARY KEY (`codigo_movimentacao`),
  KEY `fk_codigo_empresa` (`fk_codigo_empresa`),
  KEY `fk_codigo_usuario` (`fk_codigo_usuario`),
  KEY `fk_codigo_departamento` (`fk_codigo_departamento`),
  KEY `fk_codigo_bem` (`fk_codigo_bem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuario`
--

CREATE TABLE `cadastro_usuario` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `matricula` int(5) DEFAULT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `confirmar_senha` varchar(15) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `fk_codigo_empresa` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_codigo_empresa` (`fk_codigo_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`codigo_usuario`, `nome_completo`, `cpf`, `matricula`, `login`, `senha`, `confirmar_senha`, `tipo_usuario`, `fk_codigo_empresa`) VALUES
(2, 'Estefano Emanoel Moreira da Silva', '089.413.224-56', 1, 'Estefano', 'aqfeadp', 'aqfeadp', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastro_departamento`
--
ALTER TABLE `cadastro_departamento`
  ADD CONSTRAINT `cadastro_departamento_ibfk_1` FOREIGN KEY (`fk_codigo_empresa`) REFERENCES `cadastro_empresa` (`codigo_empresa`);

--
-- Limitadores para a tabela `cadastro_movimentacao`
--
ALTER TABLE `cadastro_movimentacao`
  ADD CONSTRAINT `cadastro_movimentacao_ibfk_1` FOREIGN KEY (`fk_codigo_empresa`) REFERENCES `cadastro_empresa` (`codigo_empresa`),
  ADD CONSTRAINT `cadastro_movimentacao_ibfk_2` FOREIGN KEY (`fk_codigo_usuario`) REFERENCES `cadastro_usuario` (`codigo_usuario`),
  ADD CONSTRAINT `cadastro_movimentacao_ibfk_3` FOREIGN KEY (`fk_codigo_departamento`) REFERENCES `cadastro_departamento` (`codigo_departamento`),
  ADD CONSTRAINT `cadastro_movimentacao_ibfk_4` FOREIGN KEY (`fk_codigo_bem`) REFERENCES `cadastro_bem` (`codigo_bem`);

--
-- Limitadores para a tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  ADD CONSTRAINT `cadastro_usuario_ibfk_1` FOREIGN KEY (`fk_codigo_empresa`) REFERENCES `cadastro_empresa` (`codigo_empresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
