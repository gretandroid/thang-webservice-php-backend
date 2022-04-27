<?php
include 'DaoGestion.php';
$link = mysqli_connect("localhost", "greta", "123", "gestion");
$input = file_get_contents("php://input");
$json = json_decode($input);
$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["PATH_INFO"];
$parameter = explode("/", $path);
if ($parameter[1] === "persons") {
	if ($method === "GET") {
		$listPerson = DaoGestion::getAllPerson($link);
		header("content-type", "/application.json");
		$encode = json_encode($listPerson);
		echo $encode;
	}

	if ($method === "POST") {
		$name = $json->name;
		$username = $json->username;
		$email = $json->email;
		$compagny = $json->compagny;
		$website = $json->website;
		
		$person = new Person($name, $username, $email, $compagny, $website);
		DaoGestion::createPerson($link, $person);
	}

	if ($method === "PUT") {
		$id = $json->id;
		$name = $json->name;
		$username = $json->username;
		$email = $json->email;
		$compagny = $json->compagny;
		$website = $json->website;
		
		$person = new Person($name, $username, $email, $compagny, $website);
		$person->setId(intval($id));
		DaoGestion::updatePerson($link, $person);
	}

	if ($method === "DELETE") {
		$id = $parameter[2];
		DaoGestion::deletePerson($link, $id);
	}
}

if ($parameter[1] === "articles") {
	if ($method === "GET") {
	
		if (! isset($parameter[2])) {
			$listArticle = DaoGestion::getAllArticles($link);
		}
		else {
			$userId = $parameter[2];
			$listArticle = DaoGestion::getAllArticlesByPerson($link, $userId);
		}
		header("content-type", "/application.json");
		$encode = json_encode($listArticle);
		echo $encode;
	}

	if ($method === "POST") {
		$userId = $json->userid;
		$title = $json->title;
		$content = $json->content;
		
		$article = new Article(0, $userId, $title, $content);
		echo DaoGestion::createArticle($link, $article);
	}

	if ($method === "PUT") {
		$id = $json->id;
		$userId = $json->userid;
		$title = $json->title;
		$content = $json->content;
		
		$article = new Article(intval($id), $userId, $title, $content);
		DaoGestion::updateArticle($link, $article);
	}

	if ($method === "DELETE") {
		$id = $parameter[2];
		DaoGestion::deleteArticle($link, $id);
	}
}


 ?>

