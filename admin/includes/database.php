<?php
require_once("new_config.php");

class Database {

    public $connection;

    function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection() {

        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(mysqli_connect_errno()){
            die ("Database connection failed badly" . mysqli_error());
        }
    }
}

/*Instanciated to be available globally */
$database = new Database();

/*Note connection tested in admin_content.php 
        <?php
        if($database->connection) {
            echo "true";
        } ?> */
?>