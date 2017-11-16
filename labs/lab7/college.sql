# Ex 1

DROP TABLE IF EXISTS student;
CREATE TABLE student (
	student_id INTEGER UNSIGNED NOT NULL PRIMARY KEY,
	name VARCHAR(10) NOT NULL,
	year TINYINT NOT NULL default "1",
	dept_no INTEGER UNSIGNED NOT NULL,
	major VARCHAR(20)
);


DROP TABLE IF EXISTS department;
CREATE TABLE department (
	dept_no INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	dept_name VARCHAR(20) NOT NULL UNIQUE,
	office VARCHAR(20) NOT NULL,
	office_tel VARCHAR(13)
);

# change the property of the major column to have 30 bytes string
ALTER TABLE student CHANGE COLUMN major major VARCHAR(30);
# check whether your change has applied succesfully applied to the student table
DESC student;
# add gender column to the student table
ALTER TABLE student ADD COLUMN gender VARCHAR(2);

# Ex 2

# Initially remove the gender column from the student table.
ALTER TABLE student DROP COLUMN gender;

INSERT INTO student (student_id, name, year, dept_no, major)
VALUES
	(20070002, '송은이', 3, 4, '경영학'),
	(20060001, '박미선', 4, 4, '경영학'), 
	(20030001, '이경규', 4, 2, '전자공학'),
	(20040003, '김용만', 3, 2, '전자공학'), 
	(20060002, '김국진', 3, 1, '컴퓨터공학'),
	(20100002, '한선화', 3, 4, '경영학'), 
	(20110001, '송지은', 2, 1, '컴퓨터공학'),
	(20080003, '전효성', 4, 3, '법학'), 
	(20040002, '김구라', 4, 5, '영문학'),
	(20070001, '김숙', 4, 4, '경영학'), 
	(20100001, '황광희', 3, 4, '경영학'),
	(20110002, '권지용', 2, 1, '전자공학'), 
	(20030002, '김재진', 5, 1, '컴퓨터공학'),
	(20070003, '신봉선', 4, 3, '법학'), 
	(20070005, '김신영', 2, 5, '영문학'),
	(20100003, '임시환', 3, 1, '컴퓨터공학'), 
	(20070007, '정준하', 2, 4, '경영학');

-- SELECT * FROM student;

INSERT INTO department (dept_name, office, office_tel)
VALUES
	('컴퓨터공학', '이학관 101호', '02-3290-0123'),
	('전자공학', '공학관 401호', '02-3290-2345'),
	('법학', '법학관 201호', '02-3290-7896'),
	('경영학', '경영관 104호', '02-3290-1112'),
	('영문학', '문화관 303호', '02-3290-4412');

-- SELECT * FROM department;

# Ex3

UPDATE department SET dept_name = '전자전기공학' WHERE dept_name = '전자공학';
INSERT INTO department (dept_name, office, office_tel) VALUES ('특수교육학과', '공학관 403호', '02-3290-2347');
SELECT * FROM department;
UPDATE student SET major = '특수교육학과', dept_no = 6 WHERE name = '송지은';
DELETE FROM student WHERE name = '권지용';
DELETE FROM student WHERE name = '김재진';

-- SELECT * FROM student;
-- SELECT * FROM department;

# Ex4

SELECT * FROM student WHERE major = '컴퓨터공학';
SELECT student_id, year, major FROM student;
SELECT * FROM student WHERE year = 3;
SELECT * FROM student WHERE year = 1 or year = 2;
SELECT * FROM student WHERE dept_no = (
	SELECT dept_no FROM department WHERE dept_name = '경영학'
);

# Ex5

SELECT * FROM student WHERE student_id LIKE '2007%';
SELECT * FROM student ORDER BY student_id;
SELECT major, avg(year) FROM student GROUP BY major HAVING avg(year) > 3;
SELECT * FROM student WHERE student_id LIKE '%2007%' LIMIT 2;