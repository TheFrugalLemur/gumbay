<?php require('includes/config.php');

//define page title
$title = 'Home - Gumbay';
$page = 'home';
$loginneeded = false;
$permissionrequired = false;
$loginforbidden = false;

//include header template
require('layout/header.php');
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1><center><u>Gumbay Australia</u></center></h1>
		<?php 
		if (isset($_SESSION['fullname'])){
		$message = ($_SESSION['fullname'] == !null) ? "<i><b>".$_SESSION['fullname']."</b></i>" : "".$_SESSION['username']."<br>Please set your profile details <a href='profile.php'>here.</a>";
		}else{
		$message = "<b><i></i></b><br>Please set your profile details <a href='profile.php'>here.</a>";
		}
		
		#
		#
		#
		
		if (isset($_GET['source']) && isset($_GET['reason'])){
			switch ($_GET['source']) {
				case 'request':
				$source = "request balance reset";
			}
			switch ($_GET['source']) {
				case 'admin':
				$source = "Balance reset";
			}
			switch ($_GET['source']) {
				case 'transactions':
				$source = "your transactions";
			}
			switch ($_GET['source']) {
				case 'allusers':
				$source = "all users";
			}
			switch ($_GET['source']) {
				case 'editprofile':
				$source = "edit your profile";
			}
			switch ($_GET['source']) {
				case 'item':
				$source = "item";
			}
			switch ($_GET['source']) {
				case 'login':
				$source = "login";
			}
			switch ($_GET['source']) {
				case 'profile':
				$source = "profile";
			}
			switch ($_GET['source']) {
				case 'register':
				$source = "register";
			}
			switch ($_GET['source']) {
				case 'createsale':
				$source = "create a sale";
			}
			
			
			
			switch ($_GET['reason']) {
				case 'nologin':
				$reason = "are not <a href=\"login.php\">logged in</a>.";
			}
			switch ($_GET['reason']) {
				case 'loggedin':
				$reason = "are already logged in.";
			}
			switch ($_GET['reason']) {
				case 'nopermission':
				$reason = "do not have permission";
			}
			$warning = "You cannot view the page <b>".$source."</b> because you ".$reason;
			echo "<h2 class=\"bg-danger\"><center>".$warning."</center></h2>";
		}
		
		
		#
		#
		#
		
		if( $user->is_logged_in() ){ 
			echo "<center><p class=\"lead\">Welcome back to Gumbay $message</p></center>	";
		}else{
			echo "<center><p class=\"lead\">Welcome to Gumbay, Australia's best sales website!</p></center>";
			echo "
			<div class=\"container\">
				<div class=\"row\">
					<div class=\"col-sm-offset-3 col-sm-6\"><br>
						<a href=\"login.php\" class=\"btn btn-block btn-lg btn-primary\"><span class=\"glyphicon glyphicon-ok\"></span> Login</a>
					</div>
				</div>
			</div><br><br>
			<div class=\"container\">
				<div class=\"row\">
					<div class=\"col-sm-offset-3 col-sm-6\">
						<a href=\"register.php\" class=\"btn btn-block btn-lg btn-success\"><span class=\"glyphicon glyphicon-ok\"></span> Register</a>
					</div>
				</div>
			</div>";
		}
		?>
</div>
  </div>
</div>


<?php
//include footer template
require('layout/footer.php');
?>
