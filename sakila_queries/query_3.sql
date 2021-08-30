SELECT co.country, co.country_id
FROM address A, city c, country co, customer cs
WHERE cs.address_id = A.address_id and A.city_id = c.city_id and c.country_id = co.country_id Group by co.country_id order by count(co.country_id) DESC LIMIT 3;
