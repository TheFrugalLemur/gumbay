<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/main.css">
	
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
					<li><a href=\"#\">Profile</a>
                    </li>
                    <li><a href=\"logout.php\">Logout</a>
                    </li>";}else{
					echo "<li><a href=\"login.php\">Login</a>
                    </li>";
					}
					?>
					<li class=""><a href="about.php">About</a></li>
                </ul>
            </div>
        </center>
		
    </div>
</div>