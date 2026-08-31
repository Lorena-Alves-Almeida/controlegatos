-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/08/2026 às 01:32
-- Versão do servidor: 8.4.7
-- Versão do PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlegatos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgato`
--

DROP TABLE IF EXISTS `tbgato`;
CREATE TABLE IF NOT EXISTS `tbgato` (
  `CdGato` int NOT NULL AUTO_INCREMENT,
  `NmGato` varchar(50) NOT NULL,
  `idRaca` int NOT NULL,
  `Preco` float NOT NULL,
  `Descricao` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CdGato`),
  KEY `idRaca` (`idRaca`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbgato`
--

INSERT INTO `tbgato` (`CdGato`, `NmGato`, `idRaca`, `Preco`, `Descricao`, `foto`) VALUES
(13, 'Sushi', 0, 0.04, 'fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo fofo', 'imagens/084047441ec7dcd0941f79a5b6e70dc0.jpg'),
(17, 'garfieldx', 0, 0.09, 'descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao descricao ', 'imagens/cb83b6f33a979468dd2d8c5ac36f682f.png'),
(18, 'jjjjjjj', 0, 0.02, 'jjjjjjjjjjjjjjj jjjjjjjjjjjjjjj jjjjjjjjjjjjjjj jjjjjjjjjjjjjjj j jjjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjj jjjjjjjjjjj jjjjjjjjjjjj jjjjjjjjjjj jjjjjjjjj', 'imagens/9954ae3617a5cb65b027029288ec9dfc.jpg'),
(19, 'jkj', 0, 0.77, 'kjnkjkjnkj dsfsdfsdf sdfsdfsdfsdf dsf dsfdfsdfg dgf fgdfsdfsdfs fdsfdff dfs dsfdfsdsfsdf sdf dsfdsfdfs s dfsdf sdsf ds sd sdf sdf sdf sdf dsf dfsdfsdssd fsdf sdf dsf', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbraca`
--

DROP TABLE IF EXISTS `tbraca`;
CREATE TABLE IF NOT EXISTS `tbraca` (
  `idRaca` int NOT NULL AUTO_INCREMENT,
  `nmRaca` varchar(40) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`idRaca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `usuario`, `senha`, `foto`) VALUES
(7, 'novo', 'oioioioi0', 'imagens/eb24bedafc1a21a7cf26b8bb6ff4f0ae.jpg'),
(8, 'oioi', 'senha6666', 'imagens/a62503f03bdf8edc35780b5dc971ce3f.jpg'),
(6, 'pantuza', 'oioioi99', 'imagens/54dcb4f086ce9bcd4d0aca11b7b04357.jpg'),
(5, 'lucas', '1aaa2', 'imagens/fc0b7393edc6946c5a23626e3a601300.jpg'),
(11, 'ss', 'senhasenha', 'imagens/9bfabb5f7907e9070a614c42f67bab27.png'),
(10, 'a senha é senhasenha', 'senhasenha', 'imagens/ffaabbbabc00581c08ba4eaf9333026b.jpg'),
(12, 'senha', 'senha', NULL),
(13, 'testefoto', 'foto', 'imagens/04d4f8ed2b0795416a0a132706263cfa.png'),
(14, 'lll', 'lll', 'imagens/241ce48d539cd79051434f2dabe29e27.jpg'),
(15, 'hbjkj', 'khbn ', ''),
(16, 'gyhihuihhuihi', 'hbjbjbj', 'imagens/45e5aa6e75bced8a9c85030701d597c8.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;