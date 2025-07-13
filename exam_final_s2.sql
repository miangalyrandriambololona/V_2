
CREATE TABLE exam_membre (
    id_membre INT PRIMARY KEY,
    nom VARCHAR(100),
    date_de_naissance DATE,
    genre VARCHAR(100),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);
CREATE TABLE exam_categorie_objet (
    id_categorie INT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);
CREATE TABLE exam_objet (
    id_objet INT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES exam_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES exam_membre(id_membre)
);
CREATE TABLE exam_images_objet (
    id_image INT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(100),
    FOREIGN KEY (id_objet) REFERENCES exam_objet(id_objet)
);
CREATE TABLE exam_emprunt(
    id_emprunt INT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES exam_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES exam_membre(id_membre)
);

--4membres
INSERT INTO exam_membre (id_membre, nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
(1, 'Fara', '2002-05-14', 'F', 'fara@tsena.mg', 'Antsirabe', 'fara123', 'fara.png'),
(2, 'Tojo', '1998-12-03', 'M', 'tojo@maro.mg', 'Toliara', 'tojo456', 'tojo.jpg'),
(3, 'Mialy', '1995-08-21', 'F', 'mialy@rano.mg', 'Fianarantsoa', 'mialy789', 'mialy.png'),
(4, 'Lova', '2000-01-30', 'M', 'lova@ravina.mg', 'Mahajanga', 'lovaSecure', 'lova.jpg');

--4catégories 
INSERT INTO exam_categorie_objet (id_categorie, nom_categorie) VALUES
(1, 'Hatsarana (Esthétique)'),
(2, 'Fanamboarana (Bricolage)'),
(3, 'Mekanisma (Mécanique)'),
(4, 'Fandrahoana (Cuisine)');

--10_objets_membre1
INSERT INTO exam_objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(1, 'Sira volon-tavy', 1, 1),
(2, 'Tavoahangy famafàna', 1, 1),
(3, 'Fisaka fametahana', 2, 1),
(4, 'Famaky kely', 2, 1),
(5, 'Paompy tanana', 3, 1),
(6, 'Fametaka kodiarana', 3, 1),
(7, 'Vilany andrahana vary', 4, 1),
(8, 'Lakana fandrahoana', 4, 1),
(9, 'Fingotra manety', 1, 1),
(10, 'Lamba fanasana tarehy', 1, 1);


--10_objets_membre2
INSERT INTO exam_objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(11, 'Borosy volo', 1, 2),
(12, 'Famaky tanana', 2, 2),
(13, 'Fametaka vato', 2, 2),
(14, 'Fantsika sy tantanana', 2, 2),
(15, 'Savony manitra', 1, 2),
(16, 'Fanalahidy lehibe', 3, 2),
(17, 'Lafaoro kely', 4, 2),
(18, 'Fandrahonana voankazo', 4, 2),
(19, 'Moteur moto', 3, 2),
(20, 'Kodiarana bisikileta', 3, 2);

--10_objets_membre3
INSERT INTO exam_objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(21, 'Kitapo hatsaran-tarehy', 1, 3),
(22, 'Fametaka jiro', 2, 3),
(23, 'Boaty fitaovana', 2, 3),
(24, 'Fanaova mofo', 4, 3),
(25, 'Mikraoba', 4, 3),
(26, 'Loko molotra', 1, 3),
(27, 'Sotro be fanendy', 4, 3),
(28, 'Sary hosodoko', 1, 3),
(29, 'Tandrify an-trano', 2, 3),
(30, 'Paompy fiara', 3, 3);

--10_objets_membre4
INSERT INTO exam_objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(31, 'Antsy lehibe', 4, 4),
(32, 'Tavy vy', 4, 4),
(33, 'Lambam-pandriana hatsarana', 1, 4),
(34, 'Aspiratera fiara', 3, 4),
(35, 'Fifohana etona', 1, 4),
(36, 'Fametahana biriky', 2, 4),
(37, 'Fanasana lovia mandeha', 4, 4),
(38, 'Milina manapaka', 3, 4),
(39, 'Fanerena rivotra', 3, 4),
(40, 'Fanaova lasopy', 4, 4);

--10_emprunts
INSERT INTO exam_emprunt (id_emprunt, id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 1, 2, '2025-07-01', '2025-07-05'),
(2, 12, 1, '2025-07-02', '2025-07-07'),
(3, 25, 4, '2025-07-03', '2025-07-09'),
(4, 30, 2, '2025-07-04', '2025-07-08'),
(5, 33, 3, '2025-07-05', '2025-07-10'),
(6, 7, 4, '2025-07-06', '2025-07-12'),
(7, 15, 3, '2025-07-07', '2025-07-13'),
(8, 21, 1, '2025-07-08', '2025-07-14'),
(9, 34, 2, '2025-07-09', '2025-07-15'),
(10, 18, 1, '2025-07-10', '2025-07-16');








