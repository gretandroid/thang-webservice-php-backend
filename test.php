<?php
include "DaoGestion.php";

$connect = mysqli_connect("localhost", "greta", "123", "gestion");

$person = new Person("Nom1", "Prenom1", "Email1", "Company1", "website1");

DaoGestion::createPerson($connect, $person);

$listPersons = DaoGestion::getAllPerson($connect);


var_dump($listPersons);

$article = new Article(1, "title1", "Blaba");
DaoGestion::createArticle($connect, $article);

$listArticles = DaoGestion::getAllArticles($connect);

var_dump($listArticles);






