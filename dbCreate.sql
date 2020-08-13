CREATE DATABASE IF NOT EXISTS BeContentDB; 

use  BeContentDB;

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
-- Category varchar(25),
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
VALUES    (1, 'Home', 'Header number 1', 'This is my Header 1', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home', Header = 'Header number 1', SubText = 'This is my Header 1', SortOrder = 0, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (2, 'Something', 'Header number 2', 'This is my Header 2', 2, 1)
ON DUPLICATE KEY UPDATE
Title = 'something', Header = 'Header number 2', SubText = 'This is my Header 2', SortOrder = 2, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (3, 'About', 'Header number 3', 'This is my Header 3', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'About', Header = 'Header number 3', SubText = 'This is my Header 3', SortOrder = 3, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (4, 'Contact Us', 'Header number 4', 'This is my Header 4', 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact Us', Header = 'Header number 4', SubText = 'This is my Header 4', SortOrder = 4, isActive = 1;

-- ---------------------
-- Sub pages
-- Note Parent Id points to the record with id=1
INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (5, 'Home 1', 'Sub Header number 1', 'This is my Sub Header 1 for ID 1', 1, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 1', Header = 'Sub Header number 1', SubText = 'This is my Sub Header 1 for ID 1', ParentPage = 1, SortOrder = 3, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (6, 'Home 2', 'Sub Header number 2', 'This is my Sub Header 2 for ID 2', 1, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 2', Header = 'Sub Header number 2', SubText = 'This is my Sub Header 2 for ID 2', ParentPage = 1, SortOrder = 4, isActive = 1;

-- Note Parent Id points to the record with id=2
INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (7, 'Something 1', 'Sub Header number 1', 'This is my Sub Header 1', 2, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 1', Header = 'Sub Header number 1', SubText = 'This is my Sub Header 1 for ID 2', ParentPage = 2, SortOrder = 3, isActive = 1;

INSERT INTO WebElements ( id, Title, Header, SubText, SortOrder, isActive)
VALUES    (8, 'Something 2', 'Sub Header number 2', 'This is my Sub Header 2', 2, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 2', Header = 'Sub Header number 2', SubText = 'This is my Sub Header 2 for ID 2', ParentPage = 2, SortOrder = 4, isActive = 1;