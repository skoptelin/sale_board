<?php
require_once("classes/connect.php");
require_once("classes/users/getUser.php");
require_once("classes/users/postUser.php");
require_once("classes/users/putUser.php");
require_once("classes/users/deleteUser.php");

$connect    = new connect();
$getUser    = new getUser();
$postUser   = new postUser();
$putUser    = new putUser();
$deleteUser = new deleteUser();

if ($_SERVER["REQUEST_METHOD"] == "GET") { // Получить юзера с id = ... или всех юзеров
    $getUser->get();

} else if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создать юзера если заполненны email, password, name
    $postUser->createUser();

} else if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Обновить данные юзера с id = ...
    $putUser->updateUser();

} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удалить строку юзера с id = ...
    $deleteUser->delete();
} 
