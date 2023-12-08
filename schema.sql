DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

--
-- Users Table
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `role` varchar(20) NOT NULL default '',
  `created_at` DATETIME,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Contacts Table
--

CREATE TABLE Contacts (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL DEFAULT '',
    `firstname` VARCHAR(255) NOT NULL DEFAULT '',
    `lastname` VARCHAR(255) NOT NULL DEFAULT '',
    `email` VARCHAR(510) NOT NULL DEFAULT '',
    `telephone` VARCHAR(255) NOT NULL DEFAULT '',
    `company` VARCHAR(255) NOT NULL DEFAULT '',
    `type` VARCHAR(255) NOT NULL DEFAULT '',
    `assigned_to` INT NOT NULL DEFAULT 0, -- Modify default value as needed
    `created_by` INT NOT NULL DEFAULT 0, -- Modify default value as needed
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


--
-- Notes Table
--

CREATE TABLE Notes (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `contact_id`INT NOT NULL, -- Adjust as needed
  `comment` TEXT,
  `created_by` INT NOT NULL, -- Adjust as needed
  `created_at`DATETIME DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Users (firstname,lastname,password,email,role,created_at) VALUES
('Jan','Levinson','passwordJAN','jan.levinson@paper.co','Member',NOW()),
('David','Wallace','passwordDAV','david.wallace@paper.co','Admin',NOW()),
('Andy','Bernard','passwordAND','andy.bernard@paper.co','Member',NOW()),
('Darryl','Philbin','passwordDAR','darrly.philbin@paper.co','Member',NOW()),
('Erin','Hannon','passwordERI','erin.hannon@paper.co','Member',NOW());


