/* Find the names (first and last) of all the actors and costumers whose first name is the same as the first name of
the actor with ID 8. Do not return the actor with ID 8 himself. Note that you cannot use the name of the actor
with ID 8 as a constant (only the ID). There is more than one way to solve this question, but you need to
provide only one solution. */

SELECT n.type, n.first_name, n.last_name FROM (
    SELECT 'Actor' as type, a.first_name, a.last_name FROM actor a where a.actor_id <>8
    UNION 
    SELECT 'Customer', c.first_name, c.last_name FROM customer c) as n
WHERE n.first_name IN (SELECT a.first_name from actor a WHERE a.actor_id =8);