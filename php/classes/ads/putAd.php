<?php

require_once("classes/DataBase.php");

class putAd extends exam{
    function updateAd() {
        
        $_PUT = json_decode(file_get_contents("php://input"), true);
        
        /* parse_str(file_get_contents("php://input"), $_PUT); */

        if (isset($_PUT["id"])){
            $_SESSION["updateAd_id"] = $_PUT["id"];

            $this->isAds($_PUT["id"]);// проверка есть ли такое объявление

            if(isset($_PUT["title"], $_PUT["discription"], $_PUT["picture"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `picture` = '{$_PUT["picture"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
  
            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"], $_PUT["picture"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `picture` = '{$_PUT["picture"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else {
                echo json_encode("false");
            }
        } elseif(isset($_PUT["picture"])) {
            print_r($_PUT);
            $fileName = "../files/" . $_PUT["picture"]["name"];
            $this->createPicture($_PUT);
            $this->update("UPDATE ads SET `picture` = '$fileName', `update_at` = CURRENT_TIME() WHERE id = {$_SESSION["updateAd_id"]}");
            
        } else {
            print_r("=======");
            echo json_encode("false");
        }
    }

    function createPicture($_PUT) { 
        $fileName = "../files/" . $_PUT["picture"]["name"];
        move_uploaded_file($_PUT["picture"]["tmp_name"], $fileName);
    }

    function update($sqlStr){
        parse_str(file_get_contents("php://input"), $_PUT);
        DataBase::query($sqlStr);
        echo json_encode("true");
        exit;
    }
}