/* Создание базы данных */
CREATE DATABASE userlistdb;

/* Создание таблицы */
CREATE TABLE `usertbl` (
`id` int(11) NOT NULL auto_increment,
`full_name` varchar(32) collate utf8_unicode_ci NOT NULL default '',
`email` varchar(32) collate utf8_unicode_ci NOT NULL default '',
`username` varchar(20) collate utf8_unicode_ci NOT NULL default '',
`password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
PRIMARY KEY  (`id`),
UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE Table tovars
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
company VARCHAR(200) NOT NULL
);

INSERT INTO tovars VALUES(NULL, 'Samsung Galaxy III','Samsumg');
INSERT INTO tovars VALUES(NULL, 'Nokia N9','Nokia');
INSERT INTO tovars VALUES(NULL, 'iPhone5','Apple');