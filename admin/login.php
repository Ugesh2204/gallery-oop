<?php require_once("includes/header.php"); ?>

<?php
/* if session is sign in then redirect to index.php */
if($session->is_signed_in()) {
 redirect("index.php");
}

/*step 2 if is set  */

if(isset($_POST['submit'])){

$username = trim($_POST['username']);
$password = trim($_POST['password']);

/*step 4 verifies the user into the database  got to user.php 
to write the methoredirect("index.php")*/
$user_found = User::verify_user($username, $password);

/*step 3 if the user is found we want to login in  */
if($user_found) {

    /*login()fond inside our session.php which is a function */
    $session->login($user_found);
    /*Once it is found we can redirect */
    redirect("index.php");
} else {
  $the_message = "Your password or username are incorrect";
}

} else {
    /*if nothing is typed in  */
    $the_message = "";
    $username = "";
    $password = "";
}

?>

  


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo isset($the_message) ? $the_message : ''; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>