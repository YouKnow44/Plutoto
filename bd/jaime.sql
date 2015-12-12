
DROP TABLE IF EXISTS `jaimes` ;
CREATE TABLE `jaimes` (
	`cle` VARCHAR( 200 ) NOT NULL ,
	`votes` INT UNSIGNED NOT NULL ,
	`dernier_vote` DATETIME NOT NULL ,
	`derniere_ip` INT NOT NULL ,
	UNIQUE ( `cle` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
