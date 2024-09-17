CREATE DATABASE EmployeeDB;
USE EmployeeDB;

CREATE TABLE Department (
    DepartId INT PRIMARY KEY,
    DepartName VARCHAR(50) NOT NULL,
    Description VARCHAR(100) NOT NULL
);

CREATE TABLE Employee (
    EmpCode CHAR(6) PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    Birthday SMALLDATETIME NOT NULL,
    Gender BIT DEFAULT 1,
    Address VARCHAR(100),
    DepartID INT,
    Salary MONEY,
    FOREIGN KEY (DepartID) REFERENCES Department(DepartId)
);

INSERT INTO Department (DepartId, DepartName, Description)
VALUES 
(1, 'IT', 'Information Technology'),
(2, 'HR', 'Human Resources'),
(3, 'Finance', 'Financial Department');

INSERT INTO Employee (EmpCode, FirstName, LastName, Birthday, Gender, Address, DepartID, Salary)
VALUES 
('EMP01', 'Harry', 'Kane', '1996-04-01', 1, '139 Main St', 1, 50000),
('EMP02', 'John', 'Smith', '1974-08-04', 0, '142 Elm St', 2, 60000),
('EMP03', 'Robin', 'Hood', '1941-12-07', 0, '144 Oak St', 3, 55000);

ALTER TABLE Employee
ADD CONSTRAINT CHK_Salary CHECK (Salary > 0);

UPDATE Employee
SET Salary = Salary * 1.10;
