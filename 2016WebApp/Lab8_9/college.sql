#ex1

DROP TABLE IF EXISTS students;
CREATE TABLE students(
	student_id INTEGER unsigned NOT NULL PRIMARY KEY,
	name VARCHAR(10) NOT NULL,
	year TINYINT NOT NULL,
	dept_no INTEGER NOT NULL default "1",
	major VARCHAR(20)
);

DROP TABLE IF EXISTS department;
CREATE TABLE department(
	dept_no INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	dept_name VARCHAR(20) NOT NULL,
	office VARCHAR(20) NOT NULL,
	office_tel VARCHAR(13),
	UNIQUE INDEX (dept_name)
);
#ex2

ALTER TABLE students CHANGE COLUMN major major VARCHAR(40);
ALTER TABLE students ADD COLUMN gender VARCHAR(2);

ALTER TABLE department CHANGE COLUMN dept_name dept_name VARCHAR(40) NOT NULL UNIQUE;
ALTER TABLE department CHANGE COLUMN office office VARCHAR(30) NOT NULL;

INSERT INTO students (student_id, name, year, dept_no, major)
VALUES
(20070002, 'James Bond', 3, 4, 'Business Administration'),
(20060001, 'Queenie', 4, 4, 'Business Administration'),
(20030001, 'Reonardo', 4, 2, 'Electronic Engineering'),
(20040003, 'Julia', 3, 2, 'Electronic Engineering'),
(20060002, 'Roosevelt', 3, 1, 'Computer Science'),
(20100002, 'Fearne', 3, 4, 'Business Administration'),
(20110001, 'Chloe', 2, 1, 'Computer Science'),
(20080003, 'Amy', 4, 3, 'Law'),
(20040002, 'Selina', 4, 5, 'English Literature'),
(20070001, 'Ellen', 4, 4, 'Business Administration'),
(20100001, 'Kathy', 3, 4, 'Business Administration'),
(20110002, 'Lucy', 2, 2, 'Electronic Engineering'),
(20030002, 'Michelle', 5, 1, 'Computer Science'),
(20070003, 'April', 4, 3, 'Law'),
(20070005, 'Alicia', 2, 5, 'English Literature'),
(20100003, 'Yullia', 3, 1, 'Computer Science'),
(20070007, 'Ashlee', 2, 4, 'Business Administration');

INSERT INTO department (dept_name, office, office_tel)
VALUES ('Computer Science', 'Engineering building', '02-3290-0123'),
('Electronic Engineering', 'Engineering building', '02-3290-2345'),
('Law', 'Law building', '02-3290-7896'),
('Business Administration', 'Administration building', '02-3290-1112'),
('English Literature', 'Literature building', '02-3290-4412');

#ex3 - 1
UPDATE department
SET dept_name = 'Electronic and Electrical Engineering'
WHERE dept_no = 2;

UPDATE students
SET major = 'Electronic and Electrical Engineering'
WHERE dept_no = 2;

#ex3 - 2
INSERT INTO department (dept_name, office, office_tel)
VALUES ('Education', 'Education building', '02-3290-2347');

#ex3 - 3
UPDATE students
SET major = 'Education', dept_no = 6
WHERE name = 'Chloe';

#ex3 - 4
DELETE FROM students
WHERE name = 'Michelle';

#ex3 - 5
UPDATE students
SET major = NULL, dept_no = NULL
WHERE name = 'Fearne';

#ex4
SELECT name FROM students WHERE dept_no = 1;
SELECT student_id, year, major FROM students;
SELECT name FROM students WHERE year = 3;
SELECT name FROM students WHERE year = 2 OR year = 1;
SELECT name FROM students NATURAL JOIN department WHERE dept_name = 'Business Administration';

#ex5
SELECT name, student_id FROM students WHERE student_id LIKE '2007%';
SELECT name, student_id FROM students ORDER BY student_id;
SELECT major, avg(year) FROM students GROUP BY major HAVING avg(year) > 3;
SELECT name, student_id FROM students WHERE student_id LIKE '2007%' LIMIT 2;
