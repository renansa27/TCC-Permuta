-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Maio-2019 às 14:26
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permutapm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu_ped` varchar(20) NOT NULL,
  `id_usu_sub` varchar(20) NOT NULL,
  `tipo_servico` varchar(40) NOT NULL,
  `data` date NOT NULL,
  `turno` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `data_sol` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(32) NOT NULL,
  `graduacao` varchar(30) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `tipo_usuario` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `senha`, `graduacao`, `matricula`, `nome`, `contato`, `numero`, `tipo_usuario`) VALUES
(9, 'e10adc3949ba59abbe56e057f20f883e', 'Primeiro Sargento', '20131015020378', 'Rodrigo Sá Cavalcante', '(85)997675485', '9911', 1),
(6, 'e10adc3949ba59abbe56e057f20f883e', 'Soldado', '30888960', 'Israel', '85999737415', '32488', 0),
(7, 'e10adc3949ba59abbe56e057f20f883e', 'Cabo', '00066024', 'Lício', '999737415', '1902', 0),
(8, 'e10adc3949ba59abbe56e057f20f883e', 'Major', '20131015020377', 'Renan Sá Cavalcante', '(85)999737415', '1199', 2),
(10, 'e10adc3949ba59abbe56e057f20f883e', 'Tenente', '20131015020379', 'Gabriel', '55555', '1000', 0),
(11, 'e10adc3949ba59abbe56e057f20f883e', 'Capitão', '20131015020380', 'Rafael', '66666', '6666', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
