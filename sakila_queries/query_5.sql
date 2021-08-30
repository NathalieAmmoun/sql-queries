SELECT DISTINCT a.first_name, a.last_name, f.title, f.release_year
FROM actor a, film f, film_actor fa
WHERE a.actor_id = fa.actor_id AND (f.description LIKE '%Crocodile%' OR f.description LIKE '%Shark%') ORDER by a.last_name;