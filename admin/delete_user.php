<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
/*if empty*/

if(empty($_GET['id'])) {
   redirect("users.php"); 
}

$user = User::find_by_id($_GET['id']);

/*if user is there */

if($user) {
    $user->delete();
    redirect("users.php");
} else {

    redirect("users.php");
}


?>

