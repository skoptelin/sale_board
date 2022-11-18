<?php
require_once("classes/DataBase.php");

class deleteUser extends isUser{
    function deleteUser() {
        if(isset($_GET["id"])) {
            $this->isUser();
            DataBase::query("DELETE FROM users WHERE id = {$_GET["id"]}");
            echo "Пользователь с ID = " . $_GET["id"] . " удален";
        } else {
            echo "Укажите ID пользователя";
        }
    }
}