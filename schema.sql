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
)ENGINE=MyISAM AUTO_INCREMENT=1080 DEFAULT CHARSET=utf8mb4;


--
-- Notes Table
--

CREATE TABLE Notes (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `contact_id`INT NOT NULL, -- Adjust as needed
  `comment` TEXT,
  `created_by` INT NOT NULL, -- Adjust as needed
  `created_at`DATETIME DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM AUTO_INCREMENT=8080 DEFAULT CHARSET=utf8mb4;


INSERT INTO Users (firstname,lastname,password,email,role,created_at) VALUES
('Jan','Levinson','passwordJAN','jan.levinson@paper.co','Member',NOW()),
('David','Wallace','passwordDAV','david.wallace@paper.co','Admin',NOW()),
('Andy','Bernard','passwordAND','andy.bernard@paper.co','Member',NOW()),
('Darryl','Philbin','passwordDAR','darrly.philbin@paper.co','Member',NOW()),
('Erin','Hannon','passwordERI','erin.hannon@paper.co','Member',NOW());


INSERT INTO Contacts (title,firstname,lastname,email,telephone,company, type, assigned_to, created_by,created_at,updated_at) VALUES
('Mr','Paul','Williams','paul.williams@gmail.com',8761234567,'Digicel','Sales Lead',4080, 4080, NOW(), NOW()),
('Mrs','Sarah','Palmer','spalm@gmail.com',8761524367,'JPS','Support',4081, 4081, NOW(), NOW()),
('Mr','Hugh','Brown','hughbrown34@gmail.com',8769870456,'NWC','Sales Lead',4080, 4081, NOW(), NOW()),
('Ms','Paula','White','whitepaul34@yahoo.com',8761345267,'Flow','Support',4082, 4080, NOW(), NOW()),
('Mr','John','Brown','jbrown59@yahoo.com',8765673296,'Pricesmart','Sales Lead',4085, 4084, NOW(), NOW()),
('Mrs','Kimberly','Knight','kknight@gmail.com',8760081256,'KFC','Support',4082, 4081, NOW(), NOW());


INSERT INTO Notes (contact_id,comment,created_by,created_at) VALUES
(1080, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos 
sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam
recusandae alias error harum maxime adipisci amet laborum.',4085,NOW()),
(1080, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
optio, eaque rerum!',4085,NOW());
