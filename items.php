<?php require('includes/config.php');

if(isset($_POST['submit'])){



}

//define page title
$title = 'Items - Gumbay';

//include header template
require('layout/header.php');
require('testsql.php');
?>

<?php

if (isset($_POST['submit'])){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}
	
	buyitem();
	
	header('location:alltransactions.php?action=success&itemID='.$_GET['item'].'');
}

?>

<?php 

if (isset($_GET['item'])){

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

	if(!$conn)
	{
		die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
	}

	mysqli_select_db($conn, 'db');

	$sql = ("SELECT * FROM items WHERE itemID = '".$_GET['item']."'");
	$result = mysqli_query($conn, $sql);

	if(!$result)
	{
		die('<p>Could not find data</p>');
	}else{
		if(mysqli_num_rows($result) > 0)
		{
				
			while($row = mysqli_fetch_assoc($result))
			{
				$itemTitle = $row['itemTitle'];
				if ($itemTitle == ""){ $itemTitle = null;}
				
				$itemDesc = (isset($row['itemDesc'])) ? $row['itemDesc'] : null;
				if ($itemDesc == ""){ $itemDesc = null;}
				
				$itemID = $row['itemID'];
				
				$itemPrice = (isset($row['price'])) ? $row['price'] : null;
				if ($itemPrice == ""){ $itemPrice = null;}
				
				$itemShipping = (isset($row['shippingPrice'])) ? $row['shippingPrice'] : null;
				if ($itemShipping == ""){ $itemShipping = null;}
				
				$memberID = $row['memberID'];
				if ($memberID == ""){ $memberID = null;}
				
				$active = $row['active'];
				if ($active == ""){ $active = null;}
			}
			echo "</table></center>";
		}
	}
}else{
	header('location: allsales.php');
}
?>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $itemTitle; ?></h3>
            </div>
            <div class="panel-body">
			
              <div class="row">
                <div class="col-md-2 col-lg-2 " align="center">  </div>
                <div class=" col-md-8 col-lg-8 "> 
				<?php 
				if(!$user->is_logged_in()){ 
					echo '<p class="bg-warning">You need to log in to buy this!</p>';
				}
				
				echo "
				<table class=\"table table-user-information\">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>";
						if ($itemTitle == null) {echo "<i>empty</i>";}else{echo $itemTitle;}
						echo "</td>
                      </tr>
                      <tr>
                        <td>Item Description:</td>
                        <td>";
						if ($itemDesc == null) {echo "<i>empty</i>";}else{echo $itemDesc;}
						echo "</td>
                      </tr> 
                      <tr>
                        <td>Item Number:</td>
                        <td>".$itemID."</td>
                      </tr>
                      <tr>
                        <td>Item Price:</td>
                        <td>$".$itemPrice."</td>
                      </tr> 
                      <tr>
                        <td>Item Shipping:</td>
                        <td>$".$itemShipping."</td>
                      </tr>
                      <tr>
                        <td>Member Number:</td>
                        <td>";
						if ($memberID == null) {echo "<i>empty</i>";}else{echo $memberID;}
						echo "</td>
                      </tr> 
					  <tr>
                        <td>Status:</td>
                        <td>";
						if ($active == null) {echo "<i>empty</i>";}elseif ($active == "yes"){echo "For sale!";}else{echo "Sold!";}
						echo "</td>
                      </tr> 
                    </tbody>
				</table> </div>
              </div>
            </div>
                <div class=\"panel-footer\">";
				?>
				
				<?php if($user->is_logged_in() && $active == "yes"){ 
					echo "<form role=\"form\" method=\"post\" action=\"\"><center><button type=\"submit\" name=\"submit\" value=\"Buy\" class=\"btn btn-primary btn-lg btn-block\">Buy me</button>";
					echo "<input type=\"hidden\" name=\"itemPrice\" value=\"".$itemPrice."\"></input>";
					echo "<input type=\"hidden\" name=\"itemShipping\" value=\"".$itemShipping."\"></input>";
					echo "<input type=\"hidden\" name=\"balance\" value=\"".$_SESSION['balance']."\"></input>";
					echo "</form></div>";
				}else{
					echo "<button type=\"button\" name=\"submit\" value=\"Buy\" class=\"btn btn-primary btn-lg btn-block\" disabled=\"disabled\">Buy me</button>";
					echo "</div>";
				}
				?>
                </div>
				
					
            
          </div>
        </div>
      </div>
    </div>
	<?php
//include footer template
require('layout/footer.php');
?>