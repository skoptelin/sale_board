<?php

require_once("Classes/DataBase.php");

class PutAd extends Exam{
    public function updateAd() {
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
        } else {
            echo json_encode("false");
        }
    }

    private function createPicture() { //Через post
        $fileName = "../files/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $fileName);
    }

    private function update($sqlStr){
        DataBase::query($sqlStr);
        echo json_encode("true");
        exit;
    }
}