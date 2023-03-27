<?php
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);
$query = "SELECT * FROM friend";
$statement = $pdo->prepare($query);

$statement->execute();

$friends = $statement->fetchAll();

foreach ($friendsArray as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'];
}

$query = "SELECT * FROM friend WHERE firstname=?";
$statement = $pdo->prepare($query);
$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare($query);
$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);

foreach ($friendsObject as $friend) {
    echo $friend->firstname . ' ' . $friend->lastname;
}

var_dump($friends);
