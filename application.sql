CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(2, 'login', 'Login privileges, granted after account confirmation'),
(1, 'admin', 'Administrative user, has access to everything.');



CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1);


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL DEFAULT '0',
  `logins` int(11) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `logins`, `last_login`, `name`) VALUES
(1, 'admin', '2fce977cb338d680c298bae25cc8e1e4', 'admin@farandal.com', 2, 2013, '1347509295', 'Administrador');


CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `organizations` (`id`, `name`, `description`) VALUES
(1, 'rway', 'RightWay'),
(2, 'kauffman', 'Kauffman');

CREATE TABLE IF NOT EXISTS `organizations_users` (
  `user_id` int(10) unsigned NOT NULL,
  `organization_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`organization_id`),
  KEY `fk_organization_id` (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `organizations_users` (`user_id`, `organization_id`) VALUES
(1, 2),(1, 1);
