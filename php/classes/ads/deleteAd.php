<?php

require_once("Classes/DataBase.php");

class DeleteAd extends Exam{
    public function delete() {
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