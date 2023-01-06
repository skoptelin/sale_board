<?php

require_once("classes/DataBase.php");

class deleteAd extends exam{
    function delete() {
        if(isset($_GET["id"])) {
            $this->isAds($_GET["id"]);
            DataBase::query("DELETE FROM ads WHERE id = {$_GET["id"]}");
            $answer = "true";
            echo json_encode($answer);
        } else {
            $answer = "false";
            echo json_encode($answer);
        }
    }
}