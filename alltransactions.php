<?php require('includes/config.php');

//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	}

//define page title
$title = 'All Transactions - Gumbay';

//include header template
require('layout/header.php');
?>
<div class="container">
	<div class="row">
			<table class="table table-hover" style="margin-bottom:100px;">
				<thead class="thead-inverse">
					<tr>
					  <th>Item Number</th>
					  <th>Transaction Number</th>
					  <th>Time of Transaction</th>
					  <th>Item Price</th>
					  <th>Shipping</th>
					  <th>Total Paid</th>
					</tr>
				</thead>
					<?php
					$swag=mysqli_connect('localhost', 'root', 'password', 'db');
					$query = $swag->query("SELECT * FROM transactions WHERE memberID = '".$_SESSION['memberID']."'");
					while($row = $query->fetch_array()){
						if (isset($_GET['itemID'])){							
							$message = ($row['itemID']==$_GET['itemID']) ? "<tr class=\"success\">" : "<tr>";
						}else{$message = "<tr>";}
						echo $message;
						echo "<td>".$row['itemID']."</td>";
						echo "<td>".$row['transactionID']."</td>";
						echo "<td>".$row['transactionTime']."</td>";
						$query2 = $swag->query("SELECT * FROM items WHERE itemID = '".$row['itemID']."'");
						while($row = $query2->fetch_array()){
							$price = $row['price'];
							$sprice = $row['shippingPrice'];
							$total = $price + $sprice;
							$alltotal = (!empty($alltotal)) ? $alltotal + $total : $total;
							echo "<td>$".$row['price']."</td>";
							echo "<td>$".$row['shippingPrice']."</td>";
						}
						echo "<td>$".$total."</td>";
						echo "</tr>";
					}
					?>
					<tr><td></td><td></td><td></td><td></td><td>Total Spent:</td><td>$<?php if (isset($alltotal)){echo $alltotal;}else{echo "0";} ?></td></tr>
			</table>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>