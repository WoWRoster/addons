# phpMyAdmin SQL Dump
# version 2.5.7
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tempo de Genera��o: Jul 22, 2004 at 04:17 
# Vers�o do Servidor: 3.23.58
# Vers�o do PHP: 4.3.2
# 
# Banco de Dados : `test`
# 

# --------------------------------------------------------

#
# Estrutura da tabela `user`
#

CREATE TABLE `user` (
  `userId` int(10) unsigned NOT NULL auto_increment,
  `userName` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`userId`),
  UNIQUE KEY `userId` (`userId`),
  KEY `userId_2` (`userId`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

#
# Extraindo dados da tabela `user`
#

INSERT INTO `user` VALUES (1, 'Olavo Alexandrino');
INSERT INTO `user` VALUES (2, 'Rom�rio');
INSERT INTO `user` VALUES (3, 'Maradona');
INSERT INTO `user` VALUES (4, 'Ronaldinho Ga�cho');
INSERT INTO `user` VALUES (5, '�dson Arantes do Nascimento (Pel�)');
INSERT INTO `user` VALUES (6, 'Rivaldo');
