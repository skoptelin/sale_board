<?php

require_once("classes/DataBase.php");

class createAd {
    
    function postAd() {
        $statusID = 3;

        $_POST["user_id"] = $_SESSION["user"];

        if(!empty ($_POST["title"] && $_POST["discription"] && $_POST["price"] && $_POST["user_id"]) && isset($_FILES["picture"], $_POST["city"])){
            $fileName = "files/" . $_FILES["picture"]["name"];
            $this->createPicture();
            $this->create("INSERT INTO ads (`title`, `discription`, `picture`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', '$fileName', {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");
        
        } else if(!empty ($_POST["title"] && $_POST["discription"] && $_POST["price"] && $_POST["user_id"]) && isset($_POST["city"])){
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");

        } else if(!empty ($_POST["title"] && $_POST["discription"] && $_POST["price"] && $_POST["user_id"]) && isset($_FILES["picture"])){
            $fileName = "files/" . $_FILES["picture"]["name"];
            $this->createPicture();
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `picture`, `user_id`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, '$fileName', {$_POST["user_id"]}, $statusID)");
        
        } else if(!empty ($_POST["title"] && $_POST["discription"] && $_POST["price"] && $_POST["user_id"])){
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `user_id`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, {$_POST["user_id"]}, $statusID)");

        } else {
            echo json_encode("false");
        }
    }

    function createPicture() { 
        $fileName = "../files/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $fileName);
    }
    
    function create($sqlStr) {
        DataBase::query($sqlStr);
        echo json_encode("true");
        exit;
    }
}