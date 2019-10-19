
CREATE TABLE `user_pref_groups` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `order` INT NOT NULL COMMENT 'Sorting order',
    `name` varchar(255) NOT NULL COMMENT 'Group name'
);
