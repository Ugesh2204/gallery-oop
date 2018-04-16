<?php

class Session {
/*Properties of the class */
    private $signed_in = false;
    public $user_id;
    public $message;

    /*step 1 */
    function __construct() {
       session_start();
       /*calling function automatically in contrustor */
       $this->check_the_login();
       $this->check_message();
    }


    /*Creating a message function */

    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }


    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }





     /*step 3 create a getter function that will 
     be able to get a private value */

    public function is_signed_in() {
        return $this->signed_in;
    }

    /*step 4 build a function that go into 
    database make sure the user is there or login  */

    public function login($user) {
        if($user) {
            /*we are assigning two thing this to that object */
            /*$user->id   the id is refering to the id in user.php */
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    /*step 5   a logout method*/

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }


     /*step 2 */
    private function check_the_login() {
        /*check if the session user id is set */

        if(isset($_SESSION['user_id'])) {
            /*we assign value to that object */
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }

    }

}

$session = new Session();


?>