CREATE DATABASE iranshop

CREATE TABLE products (
    p_id int  NOT NULL,
    p_name varchar(255),
    price  int(50),
    count int(10),
    cpu   varchar(50),
    gpu varchar(50),
    ram varchar(50),

    PRIMARY KEY (p_id)

);

CREATE INDEX pc_info on products(cpu,gpu,ram);



CREATE TABLE users (
    id int  NOT NULL,
    name varchar(100),
    family varchar(100),
    status enum('active','disactive'),
    password   varchar(30),
    email varchar(50),

    PRIMARY KEY (id)

);

CREATE TABLE comments (
    id int    NOT NULL,
    u_id int  NOT NULL,
    fullname varchar(255),
    email varchar(50),
    title varchar(100),
    message varchar(255)

    PRIMARY KEY (id)

);

CREATE TABLE cart (
    id int    NOT NULL,
    p_id int  NOT NULL,
    u_id int  NOT NULL,
    p_name varchar(255),
    quantity int(10),

    PRIMARY KEY (id)

);