CREATE TABLE `table_name` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rowSts` enum('active','suspended','defunct') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB

