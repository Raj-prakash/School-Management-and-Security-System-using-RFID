?>
  <h2>
	<form name="f1" method="POST">
<?php
	$con=$_SESSION['con'];
	$regno= $_SESSION["regno"];
	$date1=$_POST["date"];
	$sql="SELECT * FROM attendance_log WHERE date1='$date1' AND regno='$regno'";
	$result=mysqli_query($con,$sql);
?>
	<table border="1">
		<tr>
			<th>RFID Number:</th>		
			<th>Regd. No.:</th>
			<th>Date:</th>
			<th>Time:</th>	
			<th>Entry:</th>
			<th>SMS Status:</th>
		</tr>
		<?php
		while($row=mysqli_fetch_array($result))
        {
		?>
		<tr>
			<td><?php echo $row['rfid']; ?></td>
			<td><?php echo $row['regno']; ?></td>
			<td><?php  echo $row['date1']; ?></td>
			<td><?php echo $row['time1']; ?></td>
			<td><?php echo $row['present_stat']; ?></td>
			<td><?php echo $row['msg_status'];  ?></td>						
		</tr>
          <?php
        }
?>
	</table>	

</form>
</h2>
