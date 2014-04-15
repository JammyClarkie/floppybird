1) CREATE TABLE  `users` (
 `id` INT( 5 ) NOT NULL AUTO_INCREMENT ,
 `email` VARCHAR( 30 ) NOT NULL ,
 `firstname` VARCHAR( 30 ) NOT NULL ,
 `surname` VARCHAR( 30 ) NOT NULL ,
 `code` VARCHAR( 10 ) NOT NULL ,
INDEX (  `id` )
)