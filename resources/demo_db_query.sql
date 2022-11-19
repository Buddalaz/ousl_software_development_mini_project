-- drop database called demo if exist 
DROP DATABASE IF EXISTS demo;

-- create database called demo
CREATE DATABASE IF NOT EXISTS demo;

-- use demo database to perform actions like create tables, insert data to tables, modifying tables
USE demo;

-- create table called user
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- insert data to user table
INSERT INTO users(username,password) 
VALUES ('admin','admin'), 
       ('guest','guest123');

-- create table called employees
CREATE TABLE employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    salary INT NOT NULL
);

-- insert data to employees table
INSERT INTO employees(name,address,salary) 
VALUES ('sandun','Colombo 15',25000), 
       ('sadaruwani','battaramulla',125000);