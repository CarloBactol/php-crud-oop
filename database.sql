-- CREATE DATABASE car 
CREATE DATABASE car;

-- CREATE TABLE register 
CREATE TABLE register(
    uid int(11) PRIMARY KEY auto_increment, 
    name varchar(60) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    dateCreated TIMESTAMP NOT NULL 
);

