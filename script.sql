CREATE DATABASE test;

USE test;

CREATE TABLE IF NOT EXISTS `employee` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
    `employee_name` varchar(255) NOT NULL COMMENT 'employee name',
    `employee_salary` double NOT NULL COMMENT 'employee salary',
    `employee_age` int(11) NOT NULL COMMENT 'employee age',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB
DEFAULT CHARSET=latin1 
COMMENT='datatable demo table' 
AUTO_INCREMENT=64;

INSERT INTO employee VALUES(NULL, 'Julia Muñoz', 300000, 32);
INSERT INTO employee VALUES(NULL, 'Pato Pérez', 200000, 30);