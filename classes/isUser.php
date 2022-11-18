<?php

require_once("classes/DataBase.php");

class isUser {
    function isUser(){ //Проверка существует ли такой юзер
        $query = DataBase::query("SELECT * FROM users WHERE id = {$_GET["id"]}");
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        if(empty($user)) {
            exit("Пользователя с ID = " . $_GET["id"] . " не существует");
        }
    }

    function isUniq() { //Проверка является ли email уникальным
        $query = DataBase::query("SELECT * FROM users WHERE `email` = '{$_POST["email"]}'");
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        if(!empty($user)) {
            exit("Пользователь с email = " . $_POST["email"] . " уже существует");
        }
    }
}
