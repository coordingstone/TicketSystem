CREATE TABLE IF NOT EXISTS `ticket` (
    `ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `opener_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `issue_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `closer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` enum('OPEN', 'CLOSED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OPEN',
    `createtime` timestamp NULL DEFAULT NULL,
    `deletetime` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`ticket_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;