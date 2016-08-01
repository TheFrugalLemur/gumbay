<?php require('includes/config.php');

//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	}

//define page title
$title = 'Demo';

//include header template
require('layout/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1><center>Gumbay Australia</center></h1>
		<center><p class="lead">
			Welcome to Gumbay, Australia's best sales website!
		</p></center>
    </div>
  </div>
</div>


<?php
//include footer template
require('layout/footer.php');
?>
