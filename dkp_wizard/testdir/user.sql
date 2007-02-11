# phpMyAdmin SQL Dump
# version 2.5.7
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tempo de Generação: Jul 22, 2004 at 04:17 
# Versão do Servidor: 3.23.58
# Versão do PHP: 4.3.2
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
INSERT INTO `user` VALUES (2, 'Romário');
INSERT INTO `user` VALUES (3, 'Maradona');
INSERT INTO `user` VALUES (4, 'Ronaldinho Gaúcho');
INSERT INTO `user` VALUES (5, 'Édson Arantes do Nascimento (Pelé)');
INSERT INTO `user` VALUES (6, 'Rivaldo');
