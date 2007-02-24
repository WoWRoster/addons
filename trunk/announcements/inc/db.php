<?php

$announce_inistdb = "CREATE TABLE `".ANNOUNCE_TABLE."` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `title` text character set latin1 NOT NULL,
  `post` longtext character set latin1 NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `active` int(2) NOT NULL default '1',
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";