CREATE TABLE `user` (
 `id` int(255) NOT NULL AUTO_INCREMENT,
 `email` varchar(255) NOT NULL,
 `referee` varchar(255) DEFAULT NULL,
 `time` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
 `ip` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`)
)

CREATE TABLE admin (
 username varchar(256) NOT NULL,
 password varchar(256) NOT NULL
)
