<?php
require_once("Classes/DataBase.php");

class DeleteUser extends Exam{
    public function delete() {
        if(isset($_GET["id"])) {
            $this->isUser($_GET["id"]);
            DataBase::query("DELETE FROM users WHERE id = {$_GET["id"]}");
            echo "Пользователь с ID = " . $_GET["id"] . " удален";
        } else {
            echo "Укажите ID пользователя";
        }
    }
}