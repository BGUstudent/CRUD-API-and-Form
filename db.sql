CREATE DATABASE projetJS CHARACTER SET utf8;

USE projetJS;

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255),
    lastName VARCHAR(255),
    firstName VARCHAR(225),
    birthday VARCHAR(255),
    email VARCHAR(255),
    pass VARCHAR(255),
    sex VARCHAR(8),
    PRIMARY KEY (id)
    )

JSON user object - create
{
	"pseudo":"ramen",
	"lastName":"alex",
	"firstName":"chauvet",
	"birthday":"18/09/1989",
	"email":"greatalex@orange.fr",
	"pass":"azerty",
	"sex":"Male"
}

