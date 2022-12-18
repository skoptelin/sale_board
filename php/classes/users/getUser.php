<?php

require_once("classes/DataBase.php");
require_once("classes/users/exam.php");

class getUser extends exam {
    function findUser($sqlString) { // Находит и отдает юзеров в формате JSON
    
        $query = DataBase::query($sqlString);
        $user = [];
        while ($row = DataBase::fetch($query)){ 
            $user[] = $row;
        }
        echo json_encode($user);
    }

    function get(){
        if (isset($_GET["id"])) { // Получить строку с данными юзера с id = ...
            $this->isUser($_GET["id"]);

            $statement = mysqli_prepare(DataBase::getConnection(), "SELECT * FROM users WHERE id = ?"); // Защита от sql инъекции
            mysqli_stmt_bind_param($statement, "i", $_GET["id"]);
            mysqli_stmt_execute($statement);
            $query = mysqli_stmt_get_result($statement);
            
            $user = [];
            while ($user[] = DataBase::fetch($query)){ 
            }
            echo json_encode($user);
        
        } elseif (isset($_GET["email"])) { // Получить строку с данными юзера с email = ...
            $this->isUser($_GET["email"]);

            $statement = mysqli_prepare(DataBase::getConnection(), "SELECT * FROM users WHERE email = ?"); // Защита от sql инъекции
            mysqli_stmt_bind_param($statement, "s", $_GET["email"]);
            mysqli_stmt_execute($statement);
            $query = mysqli_stmt_get_result($statement);
            
            $user = [];
            while ($user[] = DataBase::fetch($query)){ 
            }
            echo json_encode($user);

        } else { // Получить все строки со всеми юзерами

            $this->findUser("SELECT * FROM users");
        }
    }
    
}