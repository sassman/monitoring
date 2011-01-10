CREATE TABLE `monitoring_objects` (
  `id` char(36) NOT NULL,
  `model` varchar(250) NOT NULL,
  `foreign_key` varchar(36) NOT NULL,
  `type` varchar(100) NOT NULL,
  `visitor_id` char(36) default NULL,
  `ip` varchar(15) default NULL,
  `user_agent` varchar(250) default NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `model` (`model`),
  KEY `foreign_key` (`foreign_key`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;