# Ex7

# search all roles grades given in the course Computer Science 143 (4 rows)
SELECT *
FROM courses c
JOIN grades g ON c.id = g.course_id
WHERE name = 'Computer Science 143';

# search names and grades of all students who took Computer Science 143 and got a B- or better (2 rows)
SELECT s.name, grade
FROM courses c
JOIN grades g ON c.id = g.course_id
JOIN students s ON s.id = g.student_id
WHERE c.name = 'Computer Science 143' AND grade <= 'B-';

# search names of all students who got a B- or better in any course, along with the names of the course and the grades (5 rows)
SELECT s.name, c.name, grade
FROM courses c
JOIN grades g ON c.id = g.course_id
JOIN students s ON s.id = g.student_id
WHERE grade <= 'B-';

# search names of all courses that have been taken by 2 or more students (2 rows)
SELECT c.name, count(g.student_id)
FROM courses c
JOIN grades g ON c.id = g.course_id
GROUP BY c.name
HAVING count(g.student_id) >= 2;