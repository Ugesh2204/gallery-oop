<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password', 'first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    /*********** Method create for user in login.php see page ***************** */
    public static function verify_user ($username, $password) {
        global $database;
        /*sanatizing the user and password */
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query("$sql");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }




     protected function properties() {

        /*get object vars to get the properties keys values */
         //return get_object_vars($this);

         $properties = array();

         foreach (self::$db_table_fields as $db_field) {

            /*quick check if the property exist */

            if(property_exists($this, $db_field)){
                /*$db_field is not an object property */
                $properties[$db_field] = $this->$db_field;
            }
         }

         return $properties;
     }


    


     




}//End of user class





?>

