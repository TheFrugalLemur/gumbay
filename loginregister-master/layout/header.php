<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><link rel="stylesheet" href="style/main.css">
	
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
<style>
body { 
    padding-top: 65px; 
}
</style>
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Gumbay</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li class=""><a href="index.php">Home</a>
                    </li>					
                    <li class=""><a href="#">Sales</a>
                    </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php
					if( $user->is_logged_in() ){
						echo "
					<li><a href=\"profile.php\">Profile</a>
                    </li>
                    <li><a href=\"logout.php\">Logout</a>
                    </li>";}else{
					echo "<li><a href=\"login.php\">Login</a>
                    </li>
					<li><a href=\"register.php\">Register</a>
                    </li>";
					}
					?>
					<li class=""><a href="about.php">About</a></li>
                </ul>
            </div>
        </center>
		
    </div>
</div>

<?php
	if( $user->is_logged_in() ){
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
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['dob'] = $row['dateofbirth'];
				}
			}
		}
			
	}
	else
	{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	mysqli_select_db($conn, 'db');	
	}
?>