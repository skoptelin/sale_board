<?php

require_once("classes/DataBase.php");
require_once("classes/ads/exam.php");

class readAds extends exam{
    function getAds(){
    
        if (isset($_GET["id"])) { 
            $this->isAds($_GET["id"]);// Проверка есть ли такое объявление
            $this->get("SELECT ads.id, ads.title, ads.discription, ads.picture, ads.price, ads.user_id, ads.city, users.name, users.avatar, users.phone_num, statuses.status_name, ads.created_at, ads.update_at 
            FROM ads 
            INNER JOIN users 
            ON ads.user_id=users.id
            INNER JOIN statuses
            ON ads.status_id=statuses.id
            WHERE ads.id = ?;", $_GET["id"]); // Получить строку с данными объявления с id = ... и данными юзера
        
        } else if(isset($_GET["user_id"])) { 
            $_GET["user_id"] = $_SESSION["user"];
            $this->isAdsByUser($_GET["user_id"]);// Проверка есть ли объявления у этого юзер id
            $this->get("SELECT ads.id, ads.title, ads.discription, ads.picture, ads.price, ads.user_id, ads.city, users.name, users.avatar, users.phone_num, statuses.status_name, ads.created_at, ads.update_at 
            FROM ads 
            INNER JOIN users 
            ON ads.user_id=users.id
            INNER JOIN statuses
            ON ads.status_id=statuses.id
            WHERE ads.user_id = ?
            ORDER BY ads.id DESC", $_GET["user_id"]); // Получение объявлений (-ия) по юзеру
    
        } else { 
            $this->getAll(); // Получить все строки со всеми объявлениями
        }
    }

    function get($sqlStr, $param) { // Получить строку с данными объявления с id = ...
        $statement = mysqli_prepare(DataBase::getConnection(), $sqlStr);
        mysqli_stmt_bind_param($statement, "i", $param);
        mysqli_stmt_execute($statement);
        $query = mysqli_stmt_get_result($statement);
        $ad = [];
        while ($row = DataBase::fetch($query)){
            $ad[] = $row;
        }
        if(!empty($ad)) {
            echo json_encode($ad); 
        } else {
            echo "Пользователя, создавшего объявление не существует(удален)";           
        }
    }
    
    function getAll() {
        $query = DataBase::query("SELECT ads.id, ads.title, ads.discription, ads.picture, ads.price, ads.user_id, ads.city, users.name, users.avatar, users.phone_num, statuses.status_name, ads.created_at, ads.update_at 
        FROM ads
        INNER JOIN users 
        ON ads.user_id=users.id
        INNER JOIN statuses
        ON ads.status_id=statuses.id
        ORDER BY ads.id DESC");
        $ads = [];
        while ($row = DataBase::fetch($query)){
            $ads[] = $row;
        }
        echo json_encode($ads);
    }
}

