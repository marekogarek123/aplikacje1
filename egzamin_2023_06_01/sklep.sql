kw1

SELECT nazwa
FROM towary
WHERE promocja = 1

kw2

SELECT cena
FROM towary
WHERE nazwa like "Markery 4 szt."

kw3

SELECT dostawcy.id, dostawcy.nazwa, COUNT(towary.id) AS liczba_towarow
FROM dostawcy, towary
WHERE towary.idDostawcy=dostawcy.id
GROUP BY dostawcy.nazwa

kw4

ALTER TABLE dostawcy ADD COLUMN informacja TEXT
