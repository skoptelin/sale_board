<?php
require_once("classes/DataBase.php");

class deleteUser extends exam{
    function delete() {
        if(isset($_GET["id"])) {
            $this->isUser($_GET["id"]);
            DataBase::query("DELETE FROM users WHERE id = {$_GET["id"]}");
            echo "Пользователь с ID = " . $_GET["id"] . " удален";
        } else {
            echo "Укажите ID пользователя";
        }
    }
}