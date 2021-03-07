CREATE DATABASE mydb;
use mydb;
CREATE TABLE items
(
    id          INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(30) NOT NULL,
    description VARCHAR(30) NOT NULL,
    price       INT(7),
    date        TIMESTAMP
);

INSERT INTO items VALUES(null,'Test', 'This is test 1',1,date);
INSERT INTO items VALUES(null,'Tes2', 'This is test 2',2,date);
INSERT INTO items VALUES(null,'Tes3', 'This is test 3',3,date);
INSERT INTO items VALUES(null,'Tes4', 'This is test 4',4,date);
INSERT INTO items VALUES(null,'Tes5', 'This is test 5',5,date);
INSERT INTO items VALUES(null,'Tes6', 'This is test 6',6,date);
INSERT INTO items VALUES(null,'Tes7', 'This is test 7',7,date);
INSERT INTO items VALUES(null,'Tes8', 'This is test 8',8,date);
INSERT INTO items VALUES(null,'Tes9', 'This is test 9',9,date);
INSERT INTO items VALUES(null,'Tes10', 'This is test 10',10,date);
INSERT INTO items VALUES(null,'Test11', 'This is test 11',11,date);