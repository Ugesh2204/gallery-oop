<?php
require_once("new_config.php");

class Database {
    public $connection;

     /*step 2  adding constructor */
    function __construct() {
        $this->open_db_connection();
    }

    /*step 1 */
    public function open_db_connection() {

        /*$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);*/

        /*the oop way */
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        /*if this connection is bad we get an error then we gona kill the database*/
        if($this->connection->connect_errno){
            die ("Database connection failed badly" . $this->connection->connect_error);
        }
    }

    /*query  step 3*/
    public function query($sql) {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    /*query  step 4*/
    private function confirm_query($result) {
        if(!$result) {
            die("Query failed" . $this->connection->connect_error);
        }
    }

    /*query  step 5 adding mysqli escapse string*/
    public function escape_string($string) {
       
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
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