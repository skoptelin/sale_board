<?php

require_once("classes/DataBase.php");
require_once("classes/isUser.php");

class getUser extends isUser {
    function findUser($sqlString) { // Отдает юзеров в формате JSON
        $query = DataBase::query($sqlString);
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        echo json_encode($user);
    }

    function readUser(){
        if (isset($_GET["id"])) { // Получить строку с данными юзера с id = ...
            $this->isUser();
            $this->findUser("SELECT * FROM users WHERE id = {$_GET["id"]}");
        
        } else { // Получить все строки со всеми юзерами
            $this->findUser("SELECT * FROM users");
        }
    }
    
}