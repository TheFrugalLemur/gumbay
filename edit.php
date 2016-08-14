<?php require('includes/config.php');
//define page title
$title = 'Edit - Gumbay';

//include header template
require('testsql.php');
?>

<?php

if(isset($_POST['submit'])){
	
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

if(!$conn)
{
	die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
}

createsqlfn();

}
?>
<?php require('layout/header.php'); ?>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
        <div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Username: <?php echo $_SESSION['username']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php $message = ($_SESSION['gender'] == "male") ? 'images/malepp.jpg' : 'images/femalepp.jpg'; echo $message;?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
				
				<form role="form" method="post" action="">
                  <table class="table table-user-information">
                    <tbody>
					  <tr>
						<td>Name:</td>
						<td><input maxlength="30" type="text" name="fullname" placeholder="<?php 
						if ($_SESSION['fullname']) {
							$message = ($_SESSION['fullname'] !== null) ? $_SESSION['fullname'] : "empty";
							echo $message;
						}
						?>"></td>
					  </tr>
					  <tr>
						<td>Date of Birth:</td>
						<td><input type="date" name="dofb" placeholder="<?php 
							$message = ($_SESSION['dob'] !== null) ? $_SESSION['dob'] : "empty";
							echo $message;
						?>"></td>
					  </tr> 
					  <tr>
						<td>Gender:</td>
						<td>
							<label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
							<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
						</td>
					  </tr> 
						
					  <tr>
						<td>Address:</td>
						<td><input maxlength="50" type="text" name="address" placeholder="<?php 
							$message = ($_SESSION['address'] !== null) ? $_SESSION['address'] : "empty";
							echo $message;
						?>"></td>
					  </tr>
					  <tr>
						<td>City:</td>
						<td><input maxlength="50" type="text" name="city" placeholder="<?php 
							$message = ($_SESSION['city'] !== null) ? $_SESSION['city'] : "empty";
							echo $message;
						?>"></td>
					  </tr>
					  <tr>
						<td>Postcode:</td>
						<td><input type="number" min="0" max="9999" name="postcode" placeholder="<?php 
							$message = ($_SESSION['postcode'] !== null) ? $_SESSION['postcode'] : "empty";
							echo $message;
						?>"></td>
					  </tr>
					  <tr>
						<td>Phone:</td>
						<td><input type="number" min="0" max="9999999999" name="phone" placeholder="<?php 
							$message = ($_SESSION['phone'] !== null) ? $_SESSION['phone'] : "empty";
							echo $message;
						?>"></td>
					  </tr>
					  
								
                    </tbody>
                  </table>
				  </div>
              </div>
            </div>

            <div class="panel-footer">
				<button type="submit" name="submit" value="Save" class="btn btn-primary btn-lg btn-block" tabindex="5">Save changes</button>
				</form>
            </div>
		</div>
        </div>
      </div>
    </div>
	<?php
//include footer template
require('layout/footer.php');
?>