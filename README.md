Projekti ne lenden Dizajni dhe Zhvillimi i Uebit me prof.Greta Ahma.
Sql te cilin duhet vendosur manualisht ne databazen e quajtur: projekti_db
me tabelat:


CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    package ENUM('basic', 'premium') NOT NULL DEFAULT 'basic'
);


CREATE TABLE jobs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    company_logo VARCHAR(255) DEFAULT NULL,
    company_name VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    company_desc VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    salary VARCHAR(100) DEFAULT NULL,
    location VARCHAR(255) NOT NULL,
    job_type ENUM('Remote', 'On-site', 'Hybrid') NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by INT(11) NOT NULL,
    job_post ENUM('free', 'premium') NOT NULL DEFAULT 'free',
    CONSTRAINT fk_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);


Projekti duhet te vendoset ne folderin htdocs ne folderin e aplikacionit XAMPP.

