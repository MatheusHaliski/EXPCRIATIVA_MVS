DROP SCHEMA IF EXISTS AvaliaAcesso;
CREATE SCHEMA AvaliaAcesso;
USE AvaliaAcesso;


CREATE TABLE `usuario`(
	`nome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `senha` INT NOT NULL
);

20:57:44	Error loading schema content	Error Code: 1558 Column count of mysql.proc is wrong. Expected 21, found 20. Created with MariaDB 100108, now running 100428. Please use mysql_upgrade to fix this error	
