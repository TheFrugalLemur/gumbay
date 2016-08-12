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
$title = 'About - Gumbay';

//include header template
require('layout/header.php');
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
							$dob = $row['dateofbirth'];
						}
						echo "</table></center>";
					}
				}
			
?>
<?php

if(isset($_POST['submit2'])){
	echo " nice";
	//if no errors have been created carry on
	if(!isset($error)){

		try {

			//redirect to register page
			header('Location: profile.php?action=save');
echo "cool";
		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
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
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
				<?php 
				echo "
				<table class=\"table table-user-information\">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>".$fullname."</td>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <td>".$dob."</td>
                      </tr>                  
                    </tbody>
				</table> </div>
              </div>
            </div>
                <div class=\"panel-footer\">";
				?>
			<a href="edit.php" data-original-title="Edit profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                        
                        <span class="pull-right">
                        <a href="logout.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </form>
						</span>
                </div>
				
					
            
          </div>
        </div>
      </div>
    </div>