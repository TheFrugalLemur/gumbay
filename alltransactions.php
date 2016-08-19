<?php require('includes/config.php');

//if logged in redirect to members page
if( !$user->is_logged_in() ){ header('Location: index.php'); }

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
			<table class="sortable table table-hover" style="margin-bottom:100px;">
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
				<tbody>
					<?php
					$swag=mysqli_connect('localhost', 'root', 'password', 'db');
					$query = $swag->query("SELECT * FROM transactions WHERE memberID = '".$_SESSION['memberID']."'");
					while($row = $query->fetch_array()){
						if (!empty($row)){
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
						echo "</tr></tbody>";
						}else{
							echo "<tr><td colspan=\"5\"><p><font size=\"20px\">No transactions!</font></p></td><th>Total Paid</th></tr>";
						}
					}
					?>
					<tfoot><tr><td colspan="4"></td><td>Total Spent:</td><td>$<?php if (isset($alltotal)){echo $alltotal;}else{echo "0";} ?></td></tr></tfoot>
			</table>
	</div>
</div>
<?php
//include footer template
require('layout/footer.php');
?>