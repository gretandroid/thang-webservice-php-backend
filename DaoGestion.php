<?php
include "Person.php";
include "Article.php";
class DaoGestion {




public static function createPerson($link,Person $person){
$name=$person->getName();
$username=$person->getUsername();
$email=$person->getEmail();
$company=$person->getCompany();
$website=$person->getWebsite();
$requete="insert into person (name,username,email,compagny,website) values ('$name','$username','$email','$company','$website')";
file_put_contents("log.txt",$requete);
mysqli_query($link,$requete);

}


static function updatePerson($link,Person $person){
$id=$person->getId();
$name=$person->getName();
$username=$person->getUsername();
$email=$person->getEmail();
$company=$person->getCompany();
$website=$person->getWebsite();
$requete="update person set name='$name',username='$username',email='$email',compagny='$company',website='$website' where id=$id";
mysqli_query($link,$requete);
echo $requete;
}



static function deletePerson($link,$id){
$requete="delete from person where id=$id";
$resultat=mysqli_query($link,$requete);
}


static function getAllPerson($link){
$persons=array();
$requete="select * from person";
$resultat=mysqli_query($link, $requete);
while ($lignes=mysqli_fetch_assoc($resultat)){
   $persons[]=$lignes;
}
return $persons;
//header("Content-type","application/json");
// $encode=json_encode($livres);
// echo $encode;
}

static function getPersonById($link,$id){
$persons="";
$requete="select * from person where id=$id";
$resultat=mysqli_query($link, $requete);
while ($lignes=mysqli_fetch_assoc($resultat)){
   $persons=$lignes;
}
return $persons;
//header("Content-type","application/json");
// $encode=json_encode($livres);
// echo $encode;
}



public static function createArticle($link,Article $article){
$userId=$article->getUserId();
$title=$article->getTitle();
$content=$article->getContent();
$requete="insert into article (userId,title,content) values ($userId,'$title','$content')";
mysqli_query($link,$requete);
$newid=mysqli_insert_id($link);
return json_encode(new Article($newid, $userId, $title, $content));
}


static function updateArticle($link,Article $article){
$id=$article->getId();
$userId=$article->getUserId();
$title=$article->getTitle();
$content=$article->getContent();
$requete="update article set userid='$userId',title='$title',content='$content' where id=$id";
mysqli_query($link,$requete);

}



static function deleteArticle($link,$id){
$requete="delete from article where id=$id";
$resultat=mysqli_query($link,$requete);
}


static function getAllArticles($link){
$allArticles['article']=array();
$articles=array();
$requete="select id,userid,title,content from article";
$resultat=mysqli_query($link, $requete);
while ($lignes=mysqli_fetch_assoc($resultat)){
   $articles[]=$lignes;
}
return $articles;

}

static function getAllArticlesByPerson($link,$id){
$allArticles['article']=array();
$articles=array();
$requete="select id,userid,title,content  from article  where userid=$id";
$resultat=mysqli_query($link, $requete);
while ($lignes=mysqli_fetch_assoc($resultat)){
   $articles[]=$lignes;
}
return $articles;
//header("Content-type","application/json");
// $encode=json_encode($livres);
// echo $encode;
}

}

// if ($method==="GET") getAll($link);
// if ($method==="POST") create($link,$input1);
// if ($method==="PUT") update($link,$input1);
// if ($method==="DELETE") delete($link,$parametre[1]);
