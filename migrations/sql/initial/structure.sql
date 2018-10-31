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

CREATE TABLE IF NOT EXISTS `ticket_attachment` (
    `ticket_attachment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `ticket_id` int(10) unsigned NOT NULL,
    `file_name` varchar(255) DEFAULT NULL,
    `extension` varchar(255) DEFAULT NULL,
    `createtime` datetime NOT NULL,
    `deletetime` datetime DEFAULT NULL,
    PRIMARY KEY (`ticket_attachment_id`),
    UNIQUE KEY `ticket_id_idx` (`ticket_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `ticket_attachment`
ADD CONSTRAINT `ticket_attachment_foreign_key_fk` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;