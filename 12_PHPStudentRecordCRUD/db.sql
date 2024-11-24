CREATE DATABASE vit_pune;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    roll_no VARCHAR(20) UNIQUE NOT NULL,
    prn_number VARCHAR(20) UNIQUE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    father_name VARCHAR(255) NOT NULL,
    mother_name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    tenth_percentage FLOAT NOT NULL,
    twelfth_percentage_or_diploma FLOAT NOT NULL,
    current_gpa FLOAT NOT NULL,
    division VARCHAR(5) NOT NULL
);
