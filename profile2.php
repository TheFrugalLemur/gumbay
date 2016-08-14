<?php 
if(1==1){
				$dbhost = 'localhost';
				$dbuser = 'root';
				$dbpass = 'password';
				
				$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
		
				if(!$conn)
				{
					die('<p>Could not connect: '.mysqli_connect_error($conn).'</p>');
				}
				
				mysqli_select_db($conn, 'db');
				$sql = "SELECT * FROM members";
				$result = mysqli_query($conn, $sql);
				
				if(!$result)
				{
					die('<p>Could not find data</p>');
				}
				
				if(mysqli_num_rows($result) > 0)
				{
					echo "<center><table cellpadding=\"10\" style=\"background-color:black; color:white; align: center;\">";
					// output data of each row
					echo "<tr id=\"title\"><td>memberID</td><td>Username</td></tr>";
						
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr style=\"background-color:lightgrey\"><td>".$row['memberID']."</td><td>".$row['username']."</td></tr>";
					}
					echo "</table></center>";
				}
			}
?>