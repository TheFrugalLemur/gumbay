<?php require('includes/config.php');


//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	}

//define page title
$title = 'Home - Gumbay';

//include header template
require('layout/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1><center>Gumbay Australia</center></h1>
		<?php 
		if (isset($_SESSION['fullname'])){
		$message = ($_SESSION['fullname'] == !null) ? "<i><b>".$_SESSION['fullname']."</b></i>" : "".$_SESSION['username']."<br>Please set your profile details <a href='profile.php'>here.</a>";
		}else{
		$message = "<b><i></i></b><br>Please set your profile details <a href='profile.php'>here.</a>";
		}
		if (isset($_GET['nologin'])){ 
			echo "<center><p class=\"lead\">You need to <a href='login.php'>log in</a> to look at your profile!</p></center>";
		}
		if (isset($_GET['nopermission'])){ 
			echo "<center><p class=\"lead\">You <i><b>do not</b></i> have permission to view this page!</p></center>";
		}
		if (isset($_GET['request'])){ 
			echo "<center><p class=\"lead\">Your request was submitted successfully!</p></center>";
		}
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
		</div>
		"; }
		?>
</div>
  </div>
</div>


<?php
//include footer template
require('layout/footer.php');
?>
