<?php

require_once("classes/DataBase.php");

class putUser extends isUser{
    function updateUser() {
        if (isset($_GET["id"])){

            $this->isUser();
            
            if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");
            
            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");
            
            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");
            
            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["email"], $_GET["birth_date"], $_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["password"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `password`= '{$_GET["password"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["email"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `email`= '{$_GET["email"]}',`update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["email"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `email`= '{$_GET["email"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["birth_date"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["birth_date"], $_GET["phone_num"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_GET["birth_date"]}', `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["birth_date"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_GET["birth_date"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["phone_num"], $_GET["avatar"])) {
                $this->update("UPDATE users SET `phone_num`= '{$_GET["phone_num"]}', `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["name"])) {
                $this->update("UPDATE users SET `name`= '{$_GET["name"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["password"])) {
                $this->update("UPDATE users SET `password`= '{$_GET["password"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["email"])) {
                $this->update("UPDATE users SET `email`= '{$_GET["email"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");
            
            } else if(isset($_GET["birth_date"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_GET["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["phone_num"])) {
                $this->update("UPDATE users SET `phone_num`= '{$_GET["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");

            } else if(isset($_GET["avatar"])) {
                $this->update("UPDATE users SET `avatar`= '{$_GET["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_GET["id"]}");
            }
            echo "Нет данных для обновления";
        } else {
            echo "Укажите ID пользователя";
        }
    }

    function update($sqlSrting) {
        $answer = "Пользователь с ID = " . $_GET["id"] . " обновлен";
        if (isset($_GET["email"])){
            $this->isUniq($_GET["email"]);
        }
        DataBase::query("$sqlSrting");
        exit ($answer);
    }
}