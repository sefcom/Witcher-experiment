GRANT ALL PRIVILEGES ON *.* TO 'debian-sys-maint'@'localhost' IDENTIFIED BY 'tD9vk1d7GlzK5pJr';

CREATE DATABASE example;

USE example;

CREATE TABLE dog(
            id  VARCHAR(100) NOT NULL,
            pname VARCHAR(100) NOT NULL,
            color VARCHAR(40) NOT NULL
    );
