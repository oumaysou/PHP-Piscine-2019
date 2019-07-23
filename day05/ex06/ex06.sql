SELECT
  titre,
  resum
FROM
  film
WHERE
  UPPER(resum) like '%VINCENT%'
ORDER BY
  id_film ASC;