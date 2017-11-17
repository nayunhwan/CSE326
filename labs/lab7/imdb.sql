# search all roles played in the movie named Pi. (28 rows)
SELECT role FROM roles r JOIN movies m ON r.movie_id = m.id WHERE name = 'Pi';

# search first/last names of all actors who appeared in Pi along with their roles (28 rows)
SELECT first_name, last_name 
FROM roles r 
JOIN movies m ON r.movie_id = m.id 
JOIN actors a ON r.actor_id = a.id 
WHERE name = 'Pi';

# search first/last names of all actors who appeared in both Kill Bill: Vol.1 and Kill Bill: Vol.2 (10 rows)
SELECT first_name, last_name
FROM actors a
JOIN roles r1  ON r1.actor_id = a.id
JOIN roles r2  ON r2.actor_id = a.id
JOIN movies m1 ON r1.movie_id = m1.id
JOIN movies m2 ON r2.movie_id = m2.id
WHERE m1.name = 'Kill Bill: Vol. 1' and m2.name = 'Kill Bill: Vol. 2';

# search for top 7 actors who have appeared in the most films, in descending order
SELECT first_name, last_name, count(movie_id)
FROM actors a
JOIN roles r ON r.actor_id = a.id
JOIN movies m ON r.movie_id = m.id
GROUP BY a.id
ORDER BY count(movie_id) DESC
LIMIT 7;

# search for top 3 most popular genres of films, in descending order
SELECT genre
FROM movies_genres g
JOIN movies m ON m.id = g.movie_id
GROUP BY genre
ORDER BY count(name) DESC
LIMIT 3;

# search the name of the director who has directed the most Thriller films
SELECT first_name, last_name
FROM directors d
JOIN movies_directors md ON d.id = md.director_id
JOIN movies_genres mg ON mg.movie_id = md.movie_id
WHERE genre = 'Thriller'
GROUP BY id
ORDER BY count(genre) DESC
LIMIT 1;
