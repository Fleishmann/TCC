-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_gigacell
CREATE DATABASE IF NOT EXISTS `db_gigacell` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_gigacell`;

-- Copiando estrutura para tabela db_gigacell.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` float NOT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gigacell.produtos: ~2 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `marca`, `quantidade`, `preco`, `modelo`) VALUES
	(39, 'CAPA', 'MOTOROLA', 0, 24.99, 'G7 PLUS'),
	(48, 'CELULAR', 'MOTOROLA', 0, 1499.99, 'G7'),
	(49, 'CELULAR', 'SAMSUNG', 1, 4499.99, 'S10');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gigacell.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `senha` (`senha`),
  FULLTEXT KEY `usuario` (`usuario`),
  FULLTEXT KEY `usuario_2` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gigacell.usuarios: ~5 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
	(4, 'victor', 'victor@victor.com.br', 'victor'),
	(5, 'victor', 'victor@victor.com.br', '1232f297a57a5a743894a0e4a801fc3'),
	(20, 'admin', 'admin@admin.com.br', ' 21232f297a57a5a743894a0e4a801fc'),
	(21, 'teste', 'teste@gmail.com', 'aa1bf4646de67fd9086cf6c79007026c'),
	(22, '', '', 'd41d8cd98f00b204e9800998ecf8427e');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gigacell.vendidos
CREATE TABLE IF NOT EXISTS `vendidos` (
  `id_vendidos` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_vendidos`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gigacell.vendidos: ~2 rows (aproximadamente)
DELETE FROM `vendidos`;
/*!40000 ALTER TABLE `vendidos` DISABLE KEYS */;
INSERT INTO `vendidos` (`id_vendidos`, `id_produto`, `nome`, `preco`, `quantidade`, `data`) VALUES
	(121, 39, 'CAPA', 24.99, 1, '05/04/2019'),
	(122, 48, 'CELULAR', 1499.99, 1, '05/04/2019'),
	(123, 48, 'CELULAR', 1499.99, 1, '05/04/2019'),
	(124, 49, 'CELULAR', 4.499, 1, '06/04/2019');
/*!40000 ALTER TABLE `vendidos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
