SELECT c.name, num.film_num
FROM (SELECT count(fc.film_id) as film_num, fc.category_id as cat_id from film_category fc group by fc.category_id having count(fc.film_id) between 55 and 65) as num, category c JOIN film_category fc ON c.category_id = fc.category_id
Where num.cat_id =fc.category_id
UNION
SELECT c.name,(Select count(fc.film_id) FROM film_category fc GROUP BY fc.category_id ORDER BY count(fc.film_id) DESC LIMIT 1)
FROM category c JOIN film_category fc ON c.category_id = fc.category_id
Where not exists(SELECT count(fc.film_id) as film_num, fc.category_id as cat_id from film_category fc group by fc.category_id having count(fc.film_id) between 55 and 65);