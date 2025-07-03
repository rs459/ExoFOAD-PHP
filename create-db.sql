CREATE DATABASE Pierre_Sofip DEFAULT CHARACTER SET = 'utf8mb4';

USE Pierre_Sofip;

/* 
• Nom
• Prénom
• Age
• Date de naissance
• Email
• Ville */
CREATE TABLE Stagiaire (
    StudentID int NOT NULL PRIMARY KEY,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255) NOT NULL,
    Birthday DATE NOT NULL,
    Email varchar(255) NOT NULL,
    City varchar(255) NOT NULL
);