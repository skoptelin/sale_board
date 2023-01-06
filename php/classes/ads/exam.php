<?php

require_once("classes/DataBase.php");

class exam {
    function isAds($id){ //Проверка существует ли такое объявление
        $query = DataBase::query("SELECT * FROM ads WHERE id = $id");
        $ads = [];
        while ($row = DataBase::fetch($query)){ 
            $ads[] = $row;
        }
        if(empty($ads)) {
            exit("Объявления с ID = " . $id . " не существует");
        }
    }
    
    function isAdsByUser($user_id){ //Проверка существуют ли объявления у юзера
        $query = DataBase::query("SELECT * FROM ads WHERE `user_id` = $user_id");
        $ads = [];
        while ($row = DataBase::fetch($query)){ 
            $ads[] = $row;
        }
        if(empty($ads)) {
            echo json_encode("false");
            exit;
        }
    }
}