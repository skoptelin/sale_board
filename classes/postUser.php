<?php

require_once("classes/DataBase.php");
require_once("classes/isUser.php");

class postUser extends isUser{
    function createUser() {
        if(isset ($_POST["email"], $_POST["password"], $_POST["name"])){

            $this->isUniq($_POST["email"]);

            if(isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["birth_date"], $_POST["avatar"], $_POST["phone_num"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `birth_date`, `avatar`, `phone_num`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["birth_date"]}', '{$_POST["avatar"]}', '{$_POST["phone_num"]}')");
    
            } else if (isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["birth_date"], $_POST["avatar"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `birth_date`, `avatar`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["birth_date"]}', '{$_POST["avatar"]}')");
    
            } else if (isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["birth_date"], $_POST["phone_num"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `birth_date`, `phone_num`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["birth_date"]}', '{$_POST["phone_num"]}')");
    
            } else if (isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["avatar"], $_POST["phone_num"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `avatar`, `phone_num`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["birth_date"]}', '{$_POST["avatar"]}', '{$_POST["phone_num"]}')");
    
            } else if(isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["birth_date"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `birth_date`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["birth_date"]}')");
    
            } else if(isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["avatar"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `avatar`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["avatar"]}')");
    
            } else if(isset ($_POST["email"], $_POST["password"], $_POST["name"], $_POST["phone_num"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`, `phone_num`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}', '{$_POST["phone_num"]}')");
    
            } else if(isset ($_POST["email"], $_POST["password"], $_POST["name"])) {
                $this->create("INSERT INTO users (`email`, `password`, `name`) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '{$_POST["name"]}')");
            }
        } else {
            echo "Заполните обязательные поля: email, пароль, имя";
        }
    }

    function create($sqlString){
        DataBase::query($sqlString);
        exit("Пользователь " . $_POST["name"] . " создан");
    }
}