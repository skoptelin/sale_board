<?php

session_start();

require_once("Classes/Connect.php");
require_once("Classes/Users/GetUser.php");
require_once("Classes/Users/PostUser.php");
require_once("Classes/Users/PutUser.php");
require_once("Classes/Users/DeleteUser.php");

$connect    = new Connect();
$getUser    = new GetUser();
$postUser   = new PostUser();
$putUser    = new PutUser();
$deleteUser = new DeleteUser();

if ($_SERVER["REQUEST_METHOD"] == "GET") { // Получить юзера с id = ... или всех юзеров
    $getUser->get();

} else if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создать юзера если заполненны email, password, name
    $postUser->createUser();

} else if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Обновить данные юзера с id = ...
    $putUser->updateUser();

} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удалить строку юзера с id = ...
    $deleteUser->delete();
} 