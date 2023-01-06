<?php

require_once("classes/DataBase.php");

class createAd {
    
    function postAd() {
        $statusID = 3;

        $_POST["user_id"] = $_SESSION["user"];

        $fileName = "files/" . $_FILES["picture"]["name"];

        if(isset ($_POST["title"], $_POST["discription"], $_FILES["picture"], $_POST["price"], $_POST["user_id"], $_POST["city"])){
            $this->createPicture();
            $this->create("INSERT INTO ads (`title`, `discription`, `picture`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', '$fileName', {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");
        
        } else if(isset ($_POST["title"], $_POST["discription"], $_POST["price"], $_POST["user_id"], $_POST["city"])){
            $this->createPicture();
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `user_id`, `city`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, {$_POST["user_id"]}, '{$_POST["city"]}', $statusID)");

        } else if(isset ($_POST["title"], $_POST["discription"], $_POST["price"], $_FILES["picture"], $_POST["user_id"])){
            $this->createPicture();
            $this->create("INSERT INTO ads (`title`, `discription`, `price`, `picture`, `user_id`, `status_id`) VALUES ('{$_POST["title"]}', '{$_POST["discription"]}', {$_POST["price"]}, '$fileName', {$_POST["user_id"]}, $statusID)");

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