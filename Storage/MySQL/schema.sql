
CREATE TABLE `user_pref_groups` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `order` INT NOT NULL COMMENT 'Sorting order',
    `name` varchar(255) NOT NULL COMMENT 'Group name'
);

CREATE TABLE `user_pref_groups_items` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `group_id` INT NOT NULL COMMENT 'Attached group ID',
    `order` INT NOT NULL COMMENT 'Sorting order',
    `name` varchar(255) NOT NULL COMMENT 'Group name',

    FOREIGN KEY (group_id) REFERENCES user_pref_groups(id) ON DELETE CASCADE
);

CREATE TABLE `user_pref_groups_items_values` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `item_id` INT NOT NULL COMMENT 'Attached item ID',
    `order` INT NOT NULL COMMENT 'Sorting order',
    `name` varchar(255) NOT NULL COMMENT 'Group name',

    FOREIGN KEY (item_id) REFERENCES user_pref_groups_items(id) ON DELETE CASCADE
);