<?php
function createsqlfn() {
	$fullname = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : null;
	$fullname = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname'], ENT_QUOTES) : null;
	$birthday = isset($_POST['dofb']) ? htmlspecialchars($_POST['dofb']) : null;
	$birthday = isset($_POST['dofb']) ? htmlspecialchars($_POST['dofb'], ENT_QUOTES) : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	$address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : null;
	$address = isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : null;
	$city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : null;
	$city = isset($_POST['city']) ? htmlspecialchars($_POST['city'], ENT_QUOTES) : null;
	$postcode = isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : null;
	$postcode = isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode'], ENT_QUOTES) : null;
	$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : null;
	$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES) : null;

	$sqlfn = "";

	if (!empty($fullname)){ 
	$sqlfn = (!empty($sqlfn)) ? $sqlfn.",fullname='$fullname'" : "fullname='$fullname'";
	}

	if (!empty($birthday)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",birthday='$birthday'";}else{$sqlfn = "birthday='$birthday'";}
	}
	
	if (!empty($gender)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",gender='$gender'";}else{$sqlfn = "gender='$gender'";}
	}

	if (!empty($address)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",address='$address'";}else{$sqlfn = "address='$address'";} 
	}

	if (!empty($city)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",city='$city'";}else{$sqlfn = "city='$city'";}
	}

	if (!empty($postcode)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",postcode='$postcode'";}else{$sqlfn = "postcode='$postcode'";}
	}

	if (!empty($phone)){ 
	if (!empty($sqlfn)){$sqlfn = $sqlfn.",phone='$phone'";}else{$sqlfn = "phone='$phone'";}
	}

	if ($sqlfn !== ""){
	$sql = "UPDATE profiles SET ".$sqlfn." WHERE memberID='".$_SESSION['memberID']."'";	
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($conn, 'db'); 
	
	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result)
	{
		die("<p>Could not enter data: ".mysql_error()."</p>");
	}
	header('Location: profile.php?success');
	}else{
	header('Location: profile.php?nothingsaved');}
}

function buyitem(){
	$itemPrice = isset($_POST['itemPrice']) ? $_POST['itemPrice'] : null;
	$itemShipping = isset($_POST['itemShipping']) ? $_POST['itemShipping'] : null;
	$balance = isset($_POST['balance']) ? $_POST['balance'] : null;

	$sqlfn = "";

	$sql = "UPDATE items SET active = 'no' WHERE itemID='".$_GET['item']."'";
	$sql2 = "INSERT INTO transactions (itemID, memberID, transactionTime) VALUES ('".$_GET['item']."', '".$_SESSION['memberID']."', NOW())";
	$pricing = ($balance - $itemPrice - $itemShipping);
	$sql3 = "UPDATE profiles SET balance = '".$pricing."' WHERE memberID = ".$_SESSION['memberID']."";
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($conn, 'db'); 
	
	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result)
	{
		die("<p>Could not enter data: ".mysql_error()."</p>");
	}
	$result2 = mysqli_query($conn, $sql2);
	
	if(!$result2)
	{
		die("<p>Could not enter data2: ".mysql_error()."</p>");
	}
	$result3 = mysqli_query($conn, $sql3);
	
	if(!$result3)
	{
		die("<p>Could not enter data2: ".mysql_error()."</p>");
	}
}
?>