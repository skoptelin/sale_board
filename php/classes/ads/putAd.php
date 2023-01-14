<?php

require_once("classes/DataBase.php");

class putAd extends exam{
    function updateAd() {
        
        /* $_PUT = json_decode(file_get_contents("php://input"), true); */ //Через json
        
        /* parse_str(file_get_contents("php://input"), $_PUT); */ //Через put

        /* if (isset($_PUT["id"])){ //Через json
            $_SESSION["updateAd_id"] = $_PUT["id"];

            $this->isAds($_PUT["id"]);// проверка есть ли такое объявление

            if(isset($_PUT["title"], $_PUT["discription"], $_PUT["picture"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `picture` = '{$_PUT["picture"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
                $this->createPicture();

            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"], $_PUT["city"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `city` = '{$_PUT["city"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
                $this->createPicture();

            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"], $_PUT["picture"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `picture` = '{$_PUT["picture"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
                $this->createPicture();

            } else if(isset($_PUT["title"], $_PUT["discription"], $_PUT["price"])) {
                $this->update("UPDATE ads SET `title` = '{$_PUT["title"]}', `discription` = '{$_PUT["discription"]}', `price` = {$_PUT["price"]}, `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
                $this->createPicture();

            } else {
                echo json_encode("false");
            } */
            if (isset($_POST["id"])){ //Через post
    
                $this->isAds($_POST["id"]);// проверка есть ли такое объявление
    
                if(!empty($_POST["title"] && $_POST["discription"] && $_POST["price"]) && isset($_FILES["picture"])) {
                    $fileName = "files/" . $_FILES["picture"]["name"];
                    $this->createPicture();
                    $this->update("UPDATE ads SET `title` = '{$_POST["title"]}', `discription` = '{$_POST["discription"]}', `price` = {$_POST["price"]}, `picture` = '$fileName', `update_at` = CURRENT_TIME() WHERE id = {$_POST["id"]}");
    
                } else if(!empty($_POST["title"] && $_POST["discription"] && $_POST["price"])) {
                    $this->update("UPDATE ads SET `title` = '{$_POST["title"]}', `discription` = '{$_POST["discription"]}', `price` = {$_POST["price"]}, `update_at` = CURRENT_TIME() WHERE id = {$_POST["id"]}");
    
                } else {
                    echo json_encode("false");
                }
/*         } elseif(isset($_PUT["picture"])) { //Через json
            print_r($_PUT);
            $fileName = "../files/" . $_PUT["picture"]["name"];
            $this->createPicture($_PUT);
            $this->update("UPDATE ads SET `picture` = '$fileName', `update_at` = CURRENT_TIME() WHERE id = {$_SESSION["updateAd_id"]}"); */
            
            } else {
                echo json_encode("false");
            }
    }

    function createPicture() { //Через post
        $fileName = "../files/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $fileName);
    }

/*     function createPicture($_PUT) { //Через json
        $fileName = "../files/" . $_PUT["picture"]["name"];
        move_uploaded_file($_PUT["picture"]["tmp_name"], $fileName);
    } */

    function update($sqlStr){
        /* parse_str(file_get_contents("php://input"), $_PUT); */ //Через json или put
        DataBase::query($sqlStr);
        echo json_encode("true");
        exit;
    }
}