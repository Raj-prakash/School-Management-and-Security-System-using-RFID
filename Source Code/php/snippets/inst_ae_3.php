if(isset($_POST['regno']))
{
$_SESSION['regno']=$_POST['regno'];
}
$regno=$_SESSION["regno"];
	$con=$_SESSION['con'];
	$sql="SELECT * FROM attendance_log WHERE regno='$regno'";
	$result=mysqli_query($con,$sql);
	?>
	<form method="POST">
	<table>
		<tr>
			<td>Unique No.</td>
			<td>Institute ID</td>
			<td>RFID Number</td>
			<td>Regd. Number</td>
      		<td>Class</td>
			<td>Date</td>
			<td>Time</td>
			<td>Entry Status</td>
			<td>SMS Status</td>
			<td>Options</td>
		</tr>
		<?php
		
		 while($row=mysqli_fetch_array($result))
		{

			?>
		<tr>
			<td><input type='text' value="<?php echo $row['slno'];?>" name='slno' readonly> </td>
			<td><input type="text" value="<?php echo $row['institute_id'] ?>" readonly></td>
			<td><input type="text" value="<?php echo $row['rfid'] ?>" readonly></td>
			<td><input type="text" value="<?php echo $row['regno'] ?>" readonly></td>
            <td><input type="text" value="<?php echo $row['class']?>" readonly></td>  
			<td><input type="Date" name='date'value="<?php echo $row['date1']?>"></td>
			<td><input type="time" name='time' value="<?php echo $row['time1']?>"></td>
			<td><input type="text" name='present_stat' value="<?php echo $row['present_stat']?>"></td>
			<td><input type="text" name='msg_stat' value="<?php echo $row['msg_stat']?>"></td>
			<td><button name="but" value="edit" type="submit">Save Changes</button></td>
			<td><button name="but" value="delete" type="submit">Delete Record</button></td>
		</tr>
	
		
	<?php
}
?></table>
	</form><?php
		if (isset($_POST["but"])) 
		{
		$but=$_POST["but"];
		$slno=$_POST['slno'];
        
		$date=$_POST["date"];
		$time=$_POST["time"];
		$present_stat=$_POST["present_stat"];
		$msg_stat=$_POST['msg_stat'];


		switch ($but) 
		{
			case 'edit':
				$qr="UPDATE attendance_log SET date1='$date', time1='$time', present_stat='$present_stat', msg_stat='$msg_stat' WHERE slno='$slno'";
				break;

			case 'delete':
				$qr="DELETE FROM attendance_log WHERE slno='$slno'";
				break;
		}
		$s=mysqli_query($con,$qr);
if($s)
{
?>
		<script type="text/javascript">
			alert('Success: attendance log Edited!!');
			location.href="http://localhost/wordpress/edit-attendance-log/";
		</script>
		<?php
		}
		else

?>
		<script type="text/javascript">
			alert('Error: Failed to edit!!');
			location.href="http://localhost/wordpress/attendance-editor/";
		</script>
		<?php
}
