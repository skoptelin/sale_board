<?php 

class DataBase {
    private static $connection;

    public static function connect() {
        if(empty(self::$connection)){
            self::$connection = mysqli_connect("localhost", "root", "", "sale_board");
        }
        if (!self::$connection) {
            exit (error_log ("Связь не установлена: " . mysqli_connect_error()));
        }
    }

    private static function getConnection() {
        return self::$connection;
    }

    public static function query($sqlString) {
        return mysqli_query(self::$connection, $sqlString);
    }

    public static function fetch($query) {
        return mysqli_fetch_assoc($query);
    }

    public static function prepareQuery($sqlStr, $character, $param) { //защита от sql инъекции
        $statement = mysqli_prepare(self::getConnection(), $sqlStr);
        mysqli_stmt_bind_param($statement, $character, $param);
        mysqli_stmt_execute($statement);
        $query = mysqli_stmt_get_result($statement);

        return $query;
    }
}