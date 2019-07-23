SELECT
  nom,
  prenom,
  FORMAT(date_naissance, "%d-%m-%Y") AS 'date de naissance'
FROM
  fiche_personne
WHERE
  YEAR(date_naissance) = 1989
ORDER BY
  nom ASC;