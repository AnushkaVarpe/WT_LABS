
CREATE DATABASE vit_results;

-- Use the newly created database
USE vit_results;

-- Create the table for storing student information and results
CREATE TABLE StudentResult (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    roll_no VARCHAR(50) NOT NULL,
    semester INT NOT NULL,
    web_programming_mse INT,
    web_programming_ese INT,
    data_structures_mse INT,
    data_structures_ese INT,
    database_systems_mse INT,
    database_systems_ese INT,
    operating_systems_mse INT,
    operating_systems_ese INT,
    total_web_programming FLOAT,
    total_data_structures FLOAT,
    total_database_systems FLOAT,
    total_operating_systems FLOAT,
    sgpa FLOAT
);
