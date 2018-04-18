<?php

class User {

    /*step 3 returnin and object not an array*/

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    public static function find_all_users() {
        /*step 2 calling static method */
      return self::find_this_query("SELECT * FROM users");


       /* Old code without calling Making database.php global so that we can use its*/
       //global $database;
       //$result_set = $database->query("SELECT * FROM users");
       //return $result_set;
    }

    public static function find_users_by_id($user_id) {
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1 ");
       /*step 8*/

       return !empty($the_result_array) ? array_shift($the_result_array) : false;

       //if(!empty($the_result_array)) {
        //   $first_item = array_shift($the_result_array);
          // return $first_item;
       //} else {
         // return false; 
       //}
     }


     /*Making it universal saving bunch of line of code  */
     /*step 1 */
     public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        /*step 7 creating and object array */
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self:: instantiation($row);
        }
        /* */

        return $the_object_array;
    }



    /*********** Method create for user in login.php see page ***************** */
    public static function verify_user ($username, $password) {
        global $database;
        /*sanatizing the user and password */
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query("$sql");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }

    /*step 4 Assigning user value to object automatically */

   public static function instantiation($the_record) {

        /*we are referencing to object self */
        $the_object = new self ();

        //$the_object->id         = $found_user['id'];
        //$the_object->username   = $found_user['username'];
        //$the_object->password   = $found_user['password'];
        //$the_object->first_name = $found_user['first_name'];
        //$the_object->last_name  = $found_user['last_name'];

        /*let return so that we can use it  */

        /*step 5 Looping method */

        foreach ($the_record as $the_attribute => $value) {

            if($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;

            }

        }

        return $the_object;
    }

     /*step 6 */

     private function has_the_attribute($the_attribute) {

        /*returning all the property of the class */

        $object_properties = get_object_vars($this);

         /*if this atttribute in this array  $object_properties
         then we return true or false*/
         return array_key_exists($the_attribute, $object_properties);

     }


    /*Create Method */

    public function create() {
        global $database;

        $sql = "INSERT INTO users (username, password, first_name, last_name)";
        /*concatonate string .= */
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) ."', '";
        $sql .= $database->escape_string($this->password) ."', '";
        $sql .= $database->escape_string($this->first_name) ."', '";
        $sql .= $database->escape_string($this->last_name) ."')";


        /*send that query  */
        if($database->query($sql)) {

            /*the_insert method will be repomsible to pull that id from laste query */
            $this->id = $database->the_insert_id();

            return true;

        } else {
            return false;
        }

    }









}//End of user class


/*Hi @Orfeas, well yes, by using $database  we are accessing that variable within methods/functions. 
For example,if you want to use $database  inside another function, you need first to type global $database;  
at the beginning of the function body,  in order to have access to that variable. */


/*The purpose of find_this_query */
/*Cristi, instead of using this $result_set = $database->query("SOME SQL CODE HERE");  
in a couple of methods, we are using find_this_query()  to perform that for us, so that 
we don't need to repeat ourselves. That is a common principle,called DRY (don't repeat yourself).
So we write all the functionality in that method,and when we need it, we just call it like thisself::find_this_query($sql); 
and later if you want to alter that functionality, you do it only in one place, in find_this_query().
Imagine if you are using that same code in like 10 other methods,and then you want to alter it, 
then you would need to change it in all 10 places, but if you put that code in a method, then 
you need to edit it only in that one particular method. */


/*Here are some of the things our app is doing!


What each method is doing ....Let's  use the User class for example 

 User::find_all()  ... Here is the flow once is called 

1.   It goes to the find_all method 

2. The find_all() returns the find_by_query() results 

3. The find_by_query()  does a couple things 

       1. it makes the query 

        2. Fetches the the data from database table using  a while loop and it returns it in $row

        3. Passes the results ($row) to the Instantiation (instantantion - weird name I know) method

        4. Returns the object in the $the_object_array variable that it gets from the  instantantion method.

        5. And that will be the result that find_all() returns when we use User::find_all()


  What the Instantation method is doing

   1. Gets the calling class name.

   2. Creates an instance of the class

   3. It loops through the $the_record variable that has all the records

   4. It checks to see if the properties exist on that object with the other method has_the_property() 

   5. If the keys from the record which basically are the columns from db table are found or equal the object properties then it assigns    the values to them.

  6. Finally it returns the object!


The purpose of this is to basically create our own API to deal with 
the database query so that in the future we can plug in other API's. 
Now there still a couple things I want to improve to make this way better, cleaner and more universal */



?>

