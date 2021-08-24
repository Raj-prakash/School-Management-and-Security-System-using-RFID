$con=$_SESSION['con'];
$sql='SELECT * FROM institute_master';
$result=mysqli_query($con,$sql);
?>
<h3>
<form method="post" action="http://localhost/wordpress/add-new-user-access-details/">
	<table><tr>
		<td>
		Field:<br><br>
					<select name="select">
						<option  value="Parent">Parent</option>
						<option value="Staff">Staff</option>
						<option value="Developer">Developer</option>
					</select><br><br>

					Institute Name: 
					*(Only For Staff & Parent)<br><br>

					<select name="inst_name">													
			<?php  

			while ($row=mysqli_fetch_array($result))
	 			{
	 		 ?>
	 				<option  value='<?php echo $row['name'];?>'>

	 					<?php echo $row['name']; ?>
	 					
	 				</option>
	 		<?php
				}

			?>
					</select><br><br>
					<button type="submit" name="" value="Search">Add</button>

			</td></tr></table></form></h3>
