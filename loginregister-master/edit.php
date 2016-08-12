<?php require('includes/config.php');
//define page title
$title = 'Edit - Gumbay';

//include header template
require('layout/header.php');
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

mysqli_select_db($conn, 'db');
echo "still working post_submit<br>";

$fullname = $_POST['fullname'];
$birthday = $_POST['dofb'];

$sqlfn = "";
$sqldob = "";

if (!$fullname == ""){ 
$sqlfn = "fullname='$fullname'"; 
$sqlcomma = "";
}
if (!$birthday == ""){ 
$sqldob = "dateofbirth='$birthday'"; 
$sqlcomma="";
if (!$sqlfn == ""){
	$sqlcomma = ",";
}
}
if (!$sqlfn == "" OR !$sqldob == ""){
$sql = "UPDATE profiles SET ".$sqlfn."".$sqlcomma."".$sqldob." WHERE memberID='$memberID'";
echo $sql."<br>";
mysqli_select_db($conn, 'db');
$retval = mysqli_query($conn, $sql);
if(!$retval)
				{
					die("<p>Could not enter data: ".mysql_error()."</p>");
				}
echo $retval."<br>";

		header('Location: profile.php');
}else{

		header('Location: profile.php');
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
				
				<form role="form" method="post" action="">
                  <table class="table table-user-information">
                    <tbody>
					  <tr>
						<td>Name:</td>
						<td><input type="text" name="fullname" placeholder="<?php echo $_SESSION['fullname'] ?>"></td>
					  </tr>
					  <tr>
						<td>Date of Birth:</td>
						<td><input type="date" name="dofb" placeholder="<?php echo $_SESSION['dob'] ?>"></td>
					  </tr>  
								
                    </tbody>
                  </table>
				  </div>
              </div>
            </div>

            <div class="panel-footer">
				<button type="submit" name="submit" value="Save" class="btn btn-sm btn-success" tabindex="5"><i class="glyphicon glyphicon-floppy-save"></i></button>
				</form>
            </div>
		</div>
        </div>
      </div>
    </div>