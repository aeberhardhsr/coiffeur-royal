/* ### CREATE STATEMENTS ### */
/* DATABASE NAME */
CREATE DATABASE IF NOT EXISTS coiffeur_royal;

/* Work with above created database */
USE coiffeur_royal;

/* TABLES */
CREATE TABLE IF NOT EXISTS visits (
    visits_id INT AUTO_INCREMENT PRIMARY KEY,
    visits_name VARCHAR(50) NOT NULL,
    visits_vorname VARCHAR(50) NOT NULL
    );

CREATE TABLE IF NOT EXISTS customer (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(30) NOT NULL,
    customer_vorname VARCHAR(30) NOT NULL,
    customer_city VARCHAR(30),
    customer_zipcode INT(4),
    customer_street VARCHAR(50)
    );

CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_purchase_price DECIMAL(6,2),
    product_price_factor DECIMAL(6,2)
    );

CREATE TABLE IF NOT EXISTS service_groups (
    service_group_id INT AUTO_INCREMENT PRIMARY KEY,
    service_group_name VARCHAR(50) NOT NULL
    );

CREATE TABLE IF NOT EXISTS services (
    services_id INT AUTO_INCREMENT PRIMARY KEY,
    services_name VARCHAR(50) NOT NULL,
    services_service_group VARCHAR(50),
    services_duration INT(3)
    );

CREATE TABLE IF NOT EXISTS cost_calculation (
    cost_calculation_id INT AUTO_INCREMENT PRIMARY KEY,
    cost_calculation_space DECIMAL(10,2),
    cost_calculation_energy DECIMAL(10,2),
    cost_calculation_water DECIMAL(10,2),
    cost_calculation_waste DECIMAL(10,2),
    cost_calculation_office DECIMAL(10,2),
    cost_calculation_office_material DECIMAL(10,2),
    cost_calculation_drinks DECIMAL(10,2),
    cost_calculation_towel DECIMAL(10,2),
    cost_calculation_accountant DECIMAL(10,2),
    cost_calculation_social_charges DECIMAL(10,2),
    cost_calculation_gross_wage_full DECIMAL(10,2),
    cost_calculation_hour_rate_full DECIMAL(10,2),
    cost_calculation_work_hours_full DECIMAL(10,2),
    cost_calculation_gross_wage_half DECIMAL(10,2),
    cost_calculation_hour_rate_half DECIMAL(10,2),
    cost_calculation_work_hours_half DECIMAL(10,2)
    );

CREATE TABLE IF NOT EXISTS customer_visit_info (
    customer_visit_info_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_visit_info_datetime DATETIME,
    customer_visit_info_notes VARCHAR(1000)
    );

CREATE TABLE IF NOT EXISTS staff_user (
    staff_user_id INT AUTO_INCREMENT PRIMARY KEY,
    staff_user_name VARCHAR(30),
    staff_user_vorname VARCHAR(30),
    staff_user_email VARCHAR(30),
    staff_user_password VARCHAR(255)
    );

/* ### INSERT STATEMENTS ### */
INSERT INTO staff_user (staff_user_name, staff_user_vorname, staff_user_email, staff_user_password) VALUES ("Werder", "Steffi", "werder.steffanie@bluewin.ch", "c78298b714888b43d2989507a02ae0344190de56");
INSERT INTO staff_user (staff_user_name, staff_user_vorname, staff_user_email, staff_user_password) VALUES ("Werder", "Romy", "werder.romy@bluewin.ch", "c78298b714888b43d2989507a02ae0344190de56");

INSERT INTO customer (customer_name, customer_vorname, customer_city, customer_zipcode, customer_street) VALUES ("Reichenberg", "Björn", "St. Gallenkappel", 8735, "Oberrainstrasse 35c");