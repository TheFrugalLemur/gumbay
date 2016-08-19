<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><link rel="stylesheet" href="style/main.css">
	<link href="sticky-footer.css" rel="stylesheet">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<script src="style/sortable.js"></script>
	<style>table.sortable th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
    content: " \25B4\25BE" 
}</style>
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
                    <li class=""><a href="sales.php">Create a Sale</a>
                    </li>					
                    <li class=""><a href="allsales.php">View Sales</a>
                    </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php
					if( $user->is_logged_in() ){
						echo "<li><a href=\"alltransactions.php\">All Transactions</a>
                    </li>
					<li><a href=\"profile.php\">Profile (".$_SESSION['username'].")</a>
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
					$_SESSION['fullname'] = ($row['fullname'] !== "") ? $row['fullname'] : null;
					$_SESSION['dob'] = ($row['dateofbirth'] !== "") ? $row['dateofbirth'] : null;
					$_SESSION['memberType'] = ($row['memberType'] !== "") ? $row['memberType'] : null;
					$_SESSION['gender'] = ($row['gender'] !== "") ? $row['gender'] : null;
					$_SESSION['address'] = ($row['address'] !== "") ? $row['address'] : null;
					$_SESSION['city'] = ($row['city'] !== "") ? $row['city'] : null;
					$_SESSION['postcode'] = ($row['postcode'] !== "") ? $row['postcode'] : null;
					$_SESSION['phone'] = ($row['phone'] !== "") ? $row['phone'] : null;
					$_SESSION['balance'] = ($row['balance'] !== "") ? $row['balance'] : null;
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