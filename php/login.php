<?php

session_start();

require_once("classes/connect.php");
require_once("classes/DataBase.php");

$connect = new connect();

if (!empty($_POST["email"] && $_POST["password"])) {
    $query = DataBase::query("SELECT * FROM users WHERE `email` = '{$_POST["email"]}' AND `password` = '{$_POST["password"]}'");
    $user = [];
    while ($row = DataBase::fetch($query)){ 
        $user[] = $row;
    }

    if (!empty($user)){
        $_SESSION["user"] = $user[0]["id"];
        echo json_encode("true");
    } else {
        echo json_encode("false");
    }
} else {
    echo json_encode("data empty");
}