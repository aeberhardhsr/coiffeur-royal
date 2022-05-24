/* ### CREATE STATEMENTS ### */
/* DATABASE NAME */
CREATE DATABASE IF NOT EXISTS coiffeur_royal;

/* Work with above created database */
USE coiffeur_royal;

/* TABLES */
CREATE TABLE IF NOT EXISTS visits (
    visits_id INT AUTO_INCREMENT PRIMARY KEY,
    visits_datetime VARCHAR(30) NOT NULL,
    visits_customer VARCHAR(50) NOT NULL,
    visits_notes VARCHAR(1000),
    visits_assignee VARCHAR(50) NOT NULL
    );

CREATE TABLE IF NOT EXISTS visits_purchase (
    visits_purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    visits_purchase_vid INT,
    visits_purchase_uid INT,
    visits_purchase_services_group_name VARCHAR(50),
    visits_purchase_services_name VARCHAR(50),
    visits_purchase_services_sales_price DECIMAL(10,2)
    );

CREATE TABLE IF NOT EXISTS customer (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(30) NOT NULL,
    customer_vorname VARCHAR(30) NOT NULL,
    customer_city VARCHAR(30),
    customer_zipcode INT(4),
    customer_street VARCHAR(50),
    customer_phone VARCHAR(40),
    customer_mail VARCHAR(50)
    );

CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_amount VARCHAR(30),
    product_purchase_price DECIMAL(6,2),
    product_margin DECIMAL(6,2) GENERATED ALWAYS AS (product_sales_price - product_purchase_price) STORED,
    product_sales_price DECIMAL(10,2)
    );

CREATE TABLE IF NOT EXISTS service_groups (
    service_group_id INT AUTO_INCREMENT PRIMARY KEY,
    service_group_name VARCHAR(50) NOT NULL
    );

CREATE TABLE IF NOT EXISTS services (
    services_id INT AUTO_INCREMENT PRIMARY KEY,
    services_name VARCHAR(50) NOT NULL,
    services_service_group VARCHAR(50),
    services_duration INT(3),
    services_factor DECIMAL(10,2),
    services_consumption DECIMAL(10,2),
    services_price_kg_liter DECIMAL(10,2),
    services_sales_price DECIMAL(10,2)
    );

CREATE TABLE IF NOT EXISTS cost_calculation (
    cost_calculation_id INT AUTO_INCREMENT PRIMARY KEY,
    cost_calculation_space DECIMAL(10,2),
    cost_calculation_parking DECIMAL(10,2),
    cost_calculation_energy DECIMAL(10,2),
    cost_calculation_water DECIMAL(10,2),
    cost_calculation_waste DECIMAL(10,2),
    cost_calculation_office DECIMAL(10,2),
    cost_calculation_office_material DECIMAL(10,2),
    cost_calculation_marketing DECIMAL(10,2),
    cost_calculation_towel DECIMAL(10,2),
    cost_calculation_accountant DECIMAL(10,2),
    cost_calculation_additional_cost DECIMAL(10,2) GENERATED ALWAYS AS (cost_calculation_space + cost_calculation_parking + cost_calculation_energy + cost_calculation_water + cost_calculation_waste + cost_calculation_office + cost_calculation_office_material + cost_calculation_marketing + cost_calculation_towel + cost_calculation_accountant) STORED,
    cost_calculation_social_charges DECIMAL(10,2),
    cost_calculation_gross_wage_full DECIMAL(10,2) GENERATED ALWAYS AS (cost_calculation_hour_rate_full * cost_calculation_work_hours_full * cost_calculation_social_charges) STORED,
    cost_calculation_hour_rate_full DECIMAL(10,2),
    cost_calculation_work_hours_full DECIMAL(10,2),
    cost_calculation_gross_wage_half DECIMAL(10,2) GENERATED ALWAYS AS (cost_calculation_hour_rate_half * cost_calculation_work_hours_half * cost_calculation_social_charges) STORED,
    cost_calculation_hour_rate_half DECIMAL(10,2),
    cost_calculation_work_hours_half DECIMAL(10,2),
    cost_calculation_gross_wage_three DECIMAL(10,2) GENERATED ALWAYS AS (cost_calculation_hour_rate_three * cost_calculation_work_hours_three * cost_calculation_social_charges) STORED,
    cost_calculation_hour_rate_three DECIMAL(10,2),
    cost_calculation_work_hours_three DECIMAL(10,2),
    cost_calculation_cost_fte DECIMAL(10,2) GENERATED ALWAYS AS ((cost_calculation_hour_rate_full * cost_calculation_work_hours_full * cost_calculation_social_charges) + (cost_calculation_hour_rate_half * cost_calculation_work_hours_half * cost_calculation_social_charges) + (cost_calculation_hour_rate_three * cost_calculation_work_hours_three * cost_calculation_social_charges) + cost_calculation_additional_cost) STORED,
    cost_calculation_hour_rate_calculated DECIMAL(10,2) GENERATED ALWAYS AS (((cost_calculation_hour_rate_full * cost_calculation_work_hours_full * cost_calculation_social_charges) + (cost_calculation_hour_rate_half * cost_calculation_work_hours_half * cost_calculation_social_charges) + (cost_calculation_hour_rate_three * cost_calculation_work_hours_three * cost_calculation_social_charges) + cost_calculation_additional_cost) / (cost_calculation_work_hours_full + cost_calculation_work_hours_half + cost_calculation_work_hours_three)) STORED
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
    staff_user_email VARCHAR(50),
    staff_user_password VARCHAR(255)
    );

/* ### INSERT STATEMENTS ### */
INSERT INTO staff_user (staff_user_name, staff_user_vorname, staff_user_email, staff_user_password) VALUES ("Werder", "Stefi", "werder.stefanie", "c78298b714888b43d2989507a02ae0344190de56");
INSERT INTO staff_user (staff_user_name, staff_user_vorname, staff_user_email, staff_user_password) VALUES ("Weibel", "Romy", "weibel.romy", "c78298b714888b43d2989507a02ae0344190de56");

INSERT INTO cost_calculation (cost_calculation_space) VALUES (0);