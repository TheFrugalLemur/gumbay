<?php require('includes/config.php');


//if form has been submitted process it
if(isset($_POST['submit'])){

	//if no errors have been created carry on
	if(!isset($error)){

		try {

			//redirect to register page
			header('Location: profile.php?action=edit');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Profile - Gumbay';

//include header template
require('layout/header.php');

if(!$user->is_logged_in()){ 
	header('Location: index.php?nologin');
	exit;
}
?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'edit'){
	
}
?>
<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}

	mysqli_select_db($conn, 'db');

	$sql = ("SELECT * FROM members WHERE username = '".$_SESSION['username']."'");
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
			{
				$memberID = $row['memberID'];
			}
	}else{
		echo "not work";
	}
	if(!$result)
	{
		die('<p>Could not find data</p>');
	}
	$sql2 = ("SELECT * FROM profiles WHERE memberID = '".$memberID."'");
	$result2 = mysqli_query($conn, $sql2);

	if(!$result2)
	{
		die('<p>Could not find data2</p>');
	}else{
		if(mysqli_num_rows($result2) > 0)
		{
				
			while($row = mysqli_fetch_assoc($result2))
			{
				$fullname = $row['fullname'];
				if ($fullname == ""){ $fullname = null;}
				
				$dob = $row['dateofbirth'];
				if ($dob == ""){ $dob = null;}
				
				$gender = $row['gender'];
				if ($gender == ""){ $gender = null;}
				
				$memberID = $row['memberID'];
				$joindate = $row['joindate'];
				
				$address = $row['address'];
				if ($address == ""){ $address = null;}
				
				$city = $row['city'];
				if ($city == ""){ $city = null;}
				
				$postcode = $row['postcode'];
				if ($postcode == ""){ $postcode = null;}
				
				$phone = $row['phone'];
				if ($phone == ""){ $phone = null;}
				
				$balance = $row['balance'];
				if ($balance == ""){ $balance = null;}
			}
		}
	}
			
?>
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION['username']; ?></h3>
            </div>
            <div class="panel-body">
			
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php $message = ($_SESSION['gender'] == "male") ? 'images/malepp.jpg' : 'images/femalepp.jpg'; echo $message;?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
				<?php 
				if (isset($_GET['success'])){
					echo '<p class="bg-success">Profile successfully changed!</p>';
				}
				
				if (isset($_GET['nothingsaved'])){
					echo '<p class="bg-success">Nothing has changed!</p>';
				}
				
				echo "
				<table class=\"table table-user-information\">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>";
						if ($fullname == null) {echo "<i>empty</i>";}else{echo $fullname;}
						echo "</td>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <td>";
						if ($dob == null) {echo "<i>empty</i>";}else{echo $dob;}
						echo "</td>
                      </tr> 
                      <tr>
                        <td>Gender:</td>
                        <td>";
						if ($gender == null) {echo "<i>undefined</i>";}else{echo $gender;}
						echo "</td>
                      </tr> 
                      <tr>
                        <td>Member Number:</td>
                        <td>".$memberID."</td>
                      </tr>
                      <tr>
                        <td>Join Date:</td>
                        <td>".$joindate."</td>
                      </tr> 
                      <tr>
                        <td>Address:</td>
                        <td>";
						if ($address == null) {echo "<i>empty</i>";}else{echo $address;}
						echo "</td>
                      </tr>
                      <tr>
                        <td>City:</td>
                        <td>";
						if ($city == null) {echo "<i>empty</i>";}else{echo $city;}
						echo "</td>
                      </tr> 
                      <tr>
                        <td>Postcode:</td>
                        <td>";
						if ($postcode == null) {echo "<i>empty</i>";}else{echo $postcode;}
						echo "</td>
                      </tr>
                      <tr>
                        <td>Phone Number:</td>
                        <td>";
						if ($phone == null) {echo "<i>empty</i>";}else{echo $phone;}
						echo "</td>
                      </tr> 
					  <tr>
                        <td>Balance:</td>
                        <td>$".$balance."</td>
                      </tr> 
					  
                    </tbody>
				</table> </div>
              </div>
            </div>
                <div class=\"panel-footer\">";
				if($_SESSION['username']=="admin"){echo "<a href=\"admin.php\" data-original-title=\"request\" data-toggle=\"tooltip\" type=\"button\" class=\"btn btn-success btn-lg btn-block\">View Balance Requests</a>";}
				?>
			<a href="request.php" data-original-title="request" data-toggle="tooltip" type="button" class="btn btn-warning btn-lg btn-block">Request Balance Reset</a>
			<a href="edit.php" data-original-title="Edit profile" data-toggle="tooltip" type="button" class="btn btn-primary btn-lg btn-block">Edit Profile</a>
                        
                        
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