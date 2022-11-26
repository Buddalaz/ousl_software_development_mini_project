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

-- create table called seed company
CREATE TABLE seed_company (
    company_famer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    company_name VARCHAR(100) NOT NULL,
    lot_coordinates VARCHAR(255) NOT NULL,
    plant_brand VARCHAR(255) NOT NULL,
    certifiying_agency VARCHAR(255) NOT NULL,
    variety VARCHAR(255) NOT NULL
);

-- insert data to seed company table
INSERT INTO seed_company(company_name,lot_coordinates,plant_brand,certifiying_agency,variety) 
VALUES ('sads','ads','dasdas','sdsasd','sdasd'), 
       ('sads','ads','dasdas','sdsasd','sdasd');

-- create table called harvester
CREATE TABLE harvester (
    field_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    harvester_ea VARCHAR(100) NOT NULL,
    lot_id VARCHAR(255) NOT NULL,
    lot_coordinates VARCHAR(255) NOT NULL,
    variety VARCHAR(255) NOT NULL,
    lot_attribute VARCHAR(255) NOT NULL,
    yield VARCHAR(255) NOT NULL,
    harvester_date DATE NOT NULL,
    chemical_application VARCHAR(255) NOT NULL,
    date_sold DATE NOT NULL,
    manufactuer_ea VARCHAR(255) NOT NULL,
    company_famer_id INT NOT NULL, 
    FOREIGN KEY (company_famer_id) REFERENCES seed_company(company_famer_id)
);

-- insert data to harvester table
INSERT INTO harvester(harvester_ea,lot_id,lot_coordinates,variety,lot_attribute,yield,harvester_date,chemical_application,date_sold,manufactuer_ea,company_famer_id) 
VALUES ('sads','L001','sdsasd','sdasd','sda333','sda333','2022-11-06','sda333','2022-11-06','HJHGH',1), 
       ('sads','L002','dasdas','sdsasd','sdasd','sda333','2022-11-06','sda333','2022-11-06','HJHGH',1);

-- create table called harvester
CREATE TABLE manufactuer(
    manufactuer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    manufactuer_ea VARCHAR(100) NOT NULL,
    shipment_date DATE NOT NULL,
    shipment_credentials VARCHAR(255) NOT NULL,
    grain_type VARCHAR(255) NOT NULL,
    purchese_date DATE NOT NULL,
    variety VARCHAR(255) NOT NULL,
    quentity INT NOT NULL,
    date_sold DATE NOT NULL,
    manufactuer_date DATE NOT NULL,
    product_id VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    weight VARCHAR(255) NOT NULL,
    manufactuer_name VARCHAR(255) NOT NULL 
);

-- insert data to harvester table
INSERT INTO manufactuer(manufactuer_ea,shipment_date,shipment_credentials,grain_type,purchese_date,variety,quentity,
        date_sold,manufactuer_date,product_id,product_name,weight,manufactuer_name) 
VALUES ('sads','2022-11-01','sdsasd','sdasd','2022-11-01','sda333',3,'2022-11-03','2022-11-03','P001','dsad','2kg','ssdasd'), 
       ('sads','2022-11-01','sdsasd','sdasd','2022-11-01','sda333',3,'2022-11-03','2022-11-03','P001','dsad','2kg','ssdasd');