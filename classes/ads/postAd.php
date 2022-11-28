<?php

require_once("classes/DataBase.php");

class createAd {
    
    function postAd() {
        $statusID = 3;

        if(isset ($_POST["title"], $_POST["discription"], $_POST["picture"], $_POST["price"], $_POST["user_id"], $_POST["city"])){
            $this->create("INSERT INTO ads (`title`, `discription`, `picture`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', `{$_POST["picture"]}` {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");
        
        } else if(isset ($_POST["title"], $_POST["discription"], $_POST["price"], $_POST["user_id"], $_POST["city"])){
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");

        } else {
            echo "Заполните обязательные поля: title, discription, price, user_id, city";
        }
    }
    
    function create($sqlStr) {
        DataBase::query($sqlStr);
        exit("Объявление " . $_POST["title"] . " создано");
    }
}