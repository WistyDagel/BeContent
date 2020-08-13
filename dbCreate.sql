-- CREATE DATABASE IF NOT EXISTS BeContentDB; 

use  BeContentDB;

DROP TABLE Users;
DROP TABLE WebElements;

create table if not exists Users(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 First_Name varchar(25) Not null,
 Last_Name varchar(25) Not null,
 UserId varchar(25),
 Pswd varchar(25),
 isAdmin int,
 isActive int
);


create table if not exists WebElements(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 Title varchar(25) Not null,
 Header varchar(25),
 SubText varchar(225),
 ParentPage int DEFAULT 0,
 SortOrder int DEFAULT 2,
 isActive int
);

-- Sample data
INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (1, 'Chris', 'Dazley', 'cdazley', 'c', 0, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'Chris', Last_Name = 'Dazley', UserId = 'cdazley', Pswd = 'c', isAdmin = 0, isActive = 1;

INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (2, 'Dery', 'Germann', 'dgermann', 'd', 0, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'Dery', Last_Name = 'Germann', UserId = 'dgermann', Pswd = 'd', isAdmin = 0, isActive = 1;

INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (3, 'Jeff', 'Rehm', 'jrehm', 'j', 1, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'Jeff', Last_Name = 'Rehm', UserId = 'jrehm', Pswd = 'j', isAdmin = 1, isActive = 1;

-- --------------------------------------
-- Main links/pages
INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (1, 'Home', 'Home Page', 'Feel free to look around our website!', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home', Header = 'Home Page', SubText = 'Feel free to look around our website!', SortOrder = 0, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (2, 'About', 'About Page', 'View our sub pages below:', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'About', Header = 'About Page', SubText = 'View our sub pages below:', SortOrder = 0, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (3, 'Contact Us', 'Contact Us', 'View our sub pages below:', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact Us', Header = 'Contact Us', SubText = 'View our sub pages below:', SortOrder = 0, isActive = 1;

-- ---------------------
-- Sub pages
-- Note Parent Id points to the record with id=1
INSERT INTO WebElements ( id, Title, Header, SubText, ParentPage, SortOrder, isActive)
VALUES    (4, 'History', 'History Page', 'This is our history', 2, 1, 1)
ON DUPLICATE KEY UPDATE
Title = 'History', Header = 'History Page', SubText = 'This is our history', ParentPage = 2, SortOrder = 1, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, ParentPage, SortOrder, isActive)
VALUES    (5, 'Mission', 'Mission', 'This is or mission', 2, 1, 1)
ON DUPLICATE KEY UPDATE
Title = 'Mission', Header = 'Mission', SubText = 'This is our mission', ParentPage = 2, SortOrder = 1, isActive = 1;

-- Note Parent Id points to the record with id=2
INSERT INTO WebElements ( id, Title, Header, SubText, ParentPage, SortOrder, isActive)
VALUES    (6, 'Locations', 'Locations Page', 'These are our locations', 3, 1, 1)
ON DUPLICATE KEY UPDATE
Title = 'Locations', Header = 'Locations Page', SubText = 'These are our locations', ParentPage = 3, SortOrder = 1, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, ParentPage, SortOrder, isActive)
VALUES    (7, 'Email', 'Email Page', 'Contact our emails below', 3, 1, 1)
ON DUPLICATE KEY UPDATE
Title = 'Email', Header = 'Email Page', SubText = 'Contact our emails below', ParentPage = 3, SortOrder = 1, isActive = 1;
