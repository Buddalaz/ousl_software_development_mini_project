-- drop database called demo_2 if exist 
DROP DATABASE IF EXISTS demo_2;

-- create database called demo_2
CREATE DATABASE IF NOT EXISTS demo_2;

-- use demo_2 database to perform actions like create tables, insert data to tables, modifying tables
USE demo_2;

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

-- create table called company
CREATE TABLE company (
    company_supplier_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    company_name VARCHAR(100) NOT NULL,
    lot_coordinates VARCHAR(255) NOT NULL,
    ingredient_type VARCHAR(255) NOT NULL,
    certifiying_agency VARCHAR(255) NOT NULL,
    variety VARCHAR(255) NOT NULL
);

-- insert data to company table
INSERT INTO company(company_name,lot_coordinates,ingredient_type,certifiying_agency,variety) 
VALUES ('sads','ads','dasdas','sdsasd','sdasd'), 
       ('sads','ads','dasdas','sdsasd','sdasd');

-- create table called harvester
CREATE TABLE distributer (
    distributer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id VARCHAR(100) NOT NULL,
    manufactuer_date DATE NOT NULL,
    expiry_date DATE NOT NULL,
    grain_type VARCHAR(255) NOT NULL,
    date_sold DATE NOT NULL,
    quentity_sold VARCHAR(255) NOT NULL,
    shipment_credentials VARCHAR(255) NOT NULL,
    distributer_ea VARCHAR(255) NOT NULL
);

-- insert data to distributer table
INSERT INTO distributer(product_id,manufactuer_date,expiry_date,grain_type,date_sold,quentity_sold,shipment_credentials,distributer_ea) 
VALUES ('P001','2022-11-01','2022-11-03','sdasd','2022-11-09','sda333','lorem','sda333'), 
       ('P002','2022-11-01','2022-11-03','sdasd','2022-11-09','sda333','lorem','sda333');

-- create table called retailer
CREATE TABLE retailer(
    retailer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(100) NOT NULL,
    retailer_name VARCHAR(100) NOT NULL,
    retailer_address VARCHAR(255) NOT NULL,
    contact_number VARCHAR(255) NOT NULL,
    purchese_date DATE NOT NULL,
    expiry_date DATE NOT NULL,
    quentity INT NOT NULL,
    retailer_ea VARCHAR(255) NOT NULL
);

-- insert data to retailer table
INSERT INTO retailer(product_name,retailer_name,retailer_address,contact_number,purchese_date,expiry_date,quentity,retailer_ea) 
VALUES ('sads','asdsa','sdsasd','sdasd','2022-11-01','2022-11-01',3,'sasd'), 
       ('sads','asdsa','sdsasd','sdasd','2022-11-01','2022-11-01',3,'sada');