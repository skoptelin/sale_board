<?php

require_once("Classes/DataBase.php");
require_once("Classes/Users/Exam.php");

class GetUser extends Exam {
    private function findUser($sqlString) { // Находит и отдает юзеров в формате JSON
        $query = DataBase::query($sqlString);
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        echo json_encode($user);
    }

    public function get(){
        if (isset($_GET["id"])) { // Получить строку с данными юзера с id = ...
            $this->isUser($_GET["id"]);
            $query = DataBase::prepareQuery("SELECT * FROM users WHERE id = ?", "i", $_GET["id"]);
            $user = [];
            while ($user[] = DataBase::fetch($query)){ 
            }
            echo json_encode($user);
        } elseif (isset($_GET["email"])) { // Получить строку с данными юзера с email = ...
            $this->isUser($_GET["email"]);
            $query = DataBase::prepareQuery("SELECT * FROM users WHERE email = ?", "s", $_GET["email"]);
            $user = [];
            while ($user[] = DataBase::fetch($query)){ 
            }
            echo json_encode($user);
        } else { // Получить все строки со всеми юзерами
            $this->findUser("SELECT * FROM users");
        }
    }
}