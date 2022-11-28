<?php

require_once("classes/DataBase.php");

class putAd extends exam{
    function updateAd() {
        parse_str(file_get_contents("php://input"), $_PUT);

        if (isset($_PUT["id"])){
            $this->isAds($_PUT["id"]);// проверка есть ли такое объявление

            if(isset($_PUT["title"], $_PUT["discription"], $_PUT["picture"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `picture` = '{$_PUT["picture"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else {
                echo "Укажите данные для обновления";
            }
            
        } else {
            echo "Укажите ID объявления";
        }
    }

    function update($sqlStr){
        parse_str(file_get_contents("php://input"), $_PUT);
        DataBase::query($sqlStr);
        exit ("Объявление с ID = " . $_PUT["id"] . " обновлено");
    }
}