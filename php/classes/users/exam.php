<?php

require_once("classes/DataBase.php");

class exam {
    function isUser($id){ //Проверка существует ли такой юзер
        $query = DataBase::query("SELECT * FROM users WHERE id = $id");
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        if(empty($user)) {
            echo json_encode("Пользователя с ID = " . $id . " не существует");
            exit;
        }
    }

    function isUniq($email) { //Проверка является ли email уникальным
        $query = DataBase::query("SELECT * FROM users WHERE `email` = '{$email}'");
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        if(!empty($user)) {
            echo json_encode("Пользователь с email = " . $email . " уже существует");
            exit;
        }
    }
}
