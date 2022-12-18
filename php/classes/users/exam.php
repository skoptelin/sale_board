<?php

require_once("classes/DataBase.php");

class exam {
    function isUser($value){ //Проверка существует ли такой юзер
        if (isset($_GET["id"])) {
            $query = DataBase::query("SELECT * FROM users WHERE id = $value");
            $user = [];
            while ($row = DataBase::fetch($query)){ 
                $user[] = $row;
            }
            if(empty($user)) {
                echo json_encode("Пользователя с ID = " . $value . " не существует");
                exit;
            }
        } elseif (isset($_GET["email"])) {
            $query = DataBase::query("SELECT * FROM users WHERE `email` = '{$value}'");
            $user = [];
            while ($row = DataBase::fetch($query)){ 
                $user[] = $row;
            }
            if(empty($user)) {
                echo json_encode("Пользователя с email = " . $value . " не существует");
                exit;
            }
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
