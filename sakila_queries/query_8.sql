SELECT sum(rent_pay), AVG(rent_pay), pr.mnth, pr.yr, pr.stre
FROM (select p.amount as rent_pay, EXtract(month from p.payment_date) as mnth, extract(year from p.payment_date) as yr, s.store_id as stre from payment p join rental r on r.rental_id = p.rental_id JOIN staff s ON p.staff_id = s.staff_id group by p.rental_id) as pr
Group by pr.yr, pr.mnth, pr.stre;