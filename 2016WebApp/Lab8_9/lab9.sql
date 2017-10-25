#ex1
#search all roles played in the movie named Pi.
SELECT role FROM roles NATURAL JOIN movies WHERE movies.name = 'Pi' AND movie_id = id;
SELECT first_name, last_name, role FROM actors NATURAL JOIN roles, movies WHERE movies.name = 'Pi' AND movie_id = movies.id AND actor_id = actors.id;

#search first/last names of all actors who appeared in Pi along with their roles
SELECT DISTINCT a.first_name, a.last_name
FROM actors a
JOIN roles r1 ON r1.actor_id = a.id
JOIN movies m1 ON r1.movie_id = m1.id
JOIN roles r2 ON r2.actor_id = a.id
JOIN movies m2 ON r2.movie_id = m2.id
WHERE m1.name = 'Kill Bill: Vol. 1'
AND m2.name = 'Kill Bill: Vol. 2';

#search first/last names of all actors who appeared in both Kill Bill: Vol.1 and Kill Bill: Vol.2
SELECT DISTINCT a.first_name, a.last_name, a.id
FROM actors a
JOIN roles r ON r.actor_id = a.id
JOIN movies m ON r.movie_id = m.id
GROUP BY a.id ORDER BY sum(a.id) DESC LIMIT 7;

#search for top 7 actors who have appeared in the most films, in descending order
SELECT DISTINCT g.genre
FROM movies_genres g
JOIN movies m ON m.id = g.movie_id
GROUP BY g.genre ORDER BY count(m.name) DESC LIMIT 3;

#search for top 3 most popular genres of films, in descending order
SELECT d.first_name, d.last_name
FROM directors d
JOIN movies_directors md ON md.director_id = d.id
JOIN movies_genres mg ON mg.movie_id = md.movie_id
WHERE mg.genre = 'Thriller'
GROUP BY d.id ORDER BY count(mg.movie_id) DESC LIMIT 1;

#search for top 3 most popular genres of films, in descending order
SELECT g.genre, count(g.genre)
FROM movies_genres g
JOIN movies m ON m.id = g.movie_id
GROUP BY g.genre
ORDER BY count(g.genre) DESC
LIMIT 3;

#search the name of the director who has directed the most Thriller films
SELECT d.first_name, d.last_name
FROM directors d
JOIN movies_directors md ON d.id = md.director_id
JOIN movies m ON m.id = md.movie_id
JOIN movies_genres mg ON mg.movie_id = m.id
WHERE genre = 'Thriller'
GROUP BY d.id
ORDER BY count(mg.genre) DESC
LIMIT 1;


-- SELECT *
-- FROM directors d
-- JOIN directors_genres dg ON dg.director_id = d.id
-- WHERE dg.genre = 'Thriller';

#ex2
SELECT *
FROM grades g
JOIN courses c ON g.course_id = c.id
WHERE c.name = 'Computer Science 143';

SELECT s.name, grade
FROM students s
JOIN grades g ON g.student_id = s.id
JOIN courses c ON g.course_id = c.id
WHERE c.name = 'Computer Science 143' AND grade <= 'B-';

SELECT s.name, c.name, grade
FROM students s
JOIN grades g ON g.student_id = s.id
JOIN courses c ON g.course_id = c.id
WHERE grade <= 'B-';

SELECT c.name
FROM courses c
JOIN grades g ON g.course_id = c.id
GROUP BY c.id
HAVING count(*) >= 2;
