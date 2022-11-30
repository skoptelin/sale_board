<?php

require_once("classes/DataBase.php");

class putUser extends exam{
    function updateUser() {

        parse_str(file_get_contents("php://input"), $_PUT);

        if (isset($_PUT["id"])){

            $this->isUser($_PUT["id"]);
            
            if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["email"], $_PUT["birth_date"], $_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["password"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `password`= '{$_PUT["password"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["email"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `email`= '{$_PUT["email"]}',`update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["email"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `email`= '{$_PUT["email"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["birth_date"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["birth_date"], $_PUT["phone_num"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_PUT["birth_date"]}', `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["birth_date"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_PUT["birth_date"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["phone_num"], $_PUT["avatar"])) {
                $this->update("UPDATE users SET `phone_num`= '{$_PUT["phone_num"]}', `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["name"])) {
                $this->update("UPDATE users SET `name`= '{$_PUT["name"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["password"])) {
                $this->update("UPDATE users SET `password`= '{$_PUT["password"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["email"])) {
                $this->update("UPDATE users SET `email`= '{$_PUT["email"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            
            } else if(isset($_PUT["birth_date"])) {
                $this->update("UPDATE users SET `birth_date`= '{$_PUT["birth_date"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["phone_num"])) {
                $this->update("UPDATE users SET `phone_num`= '{$_PUT["phone_num"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");

            } else if(isset($_PUT["avatar"])) {
                $this->update("UPDATE users SET `avatar`= '{$_PUT["avatar"]}', `update_at` = CURRENT_TIME() WHERE id = {$_PUT["id"]}");
            }
            echo "Нет данных для обновления";
        } else {
            echo "Укажите ID пользователя";
        }
    } 

    function update($sqlSrting) {
        parse_str(file_get_contents("php://input"), $_PUT);
        if (isset($_PUT["email"])){
            $this->isUniq($_PUT["email"]);
        }
        DataBase::query($sqlSrting);
        exit ("Пользователь с ID = " . $_PUT["id"] . " обновлен");
    }
}