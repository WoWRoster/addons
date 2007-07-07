ALTER TABLE `roster_raids` ADD `deleted` INT( 1 ) DEFAULT '0' AFTER `note` ;
ALTER TABLE `roster_raids` ADD `instanceid` INT( 12 ) NOT NULL AFTER `raidnum` ;
ALTER TABLE `roster_raids` ADD INDEX `instanceid` ( `instanceid` );