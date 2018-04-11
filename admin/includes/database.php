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

        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(mysqli_connect_errno()){
            die ("Database connection failed badly" . mysqli_error());
        }
    }

    /*query  step 3*/
    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    /*query  step 4*/
    private function confirm_query($result) {
        if(!$result) {
            die("Query failed");
        }
    }

    /*query  step 5 adding mysqli escapse string*/
    public function escape_string($string) {
        /*pass two parametters connections and the string */
        $escaped_string = mysqli_real_escape_string($this->connection,$string);
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