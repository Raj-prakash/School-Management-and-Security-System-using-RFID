$con=$_SESSION['con'];
if (isset($_POST["regno"])) {
	$regno=$_POST["regno"];
	$sql="SELECT * FROM student_master WHERE regno='$regno'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	if(empty($row))
	{
?>
		<script type="text/javascript">
			alert('Error: Student with that registration number not found!!!');
			location.href="http://localhost/wordpress/attendance-editor/";
		</script>
		<?php
	}
	else{
?>
<form method="POST">
	<table>
		<tr>
			<td>Institute ID</td>
			<td><input type="text" name="inst_id" value="<?php echo $row['institute_id'] ?>" readonly></td>
		</tr>
		<tr>
			<td>RFID No.</td>
			<td><input type="text" name="rfid" value="<?php echo $row['rfid'] ?>" readonly></td>
		</tr>
		<tr>
			<td>Regd. No.</td>
			<td><input type="text" name="reg" value="<?php echo $row['regno'] ?>" readonly></td>
		</tr>
  		<tr>
			<td>Class</td>
			<td><input type="text" name="class" value="<?php echo $row['class'] ?>" readonly></td>
		</tr>
  
		<tr>
			<td>Date</td>
			<td><input type="Date" name="date"></td>
		</tr>
		<tr>
			<td>Time</td>
			<td><input type="Time" name="time"></td>
		</tr>
		<tr>
			<td>Present Status<br>*to be filled only once for the entire day..</td>
			<td><input type="text" name="present_stat"></td>
		</tr>
<tr>		<td colspan="2"><center><button type=submit>Add Into Attendance Log & Send SMS</button></center></td>
		</tr>		
	</table>
</form>
	<?php
}
}
		if (isset($_POST["date"]) && isset($_POST["time"]))
		{
			$inst_id=$_POST["inst_id"];
			$rfid=$_POST["rfid"];
			$reg=$_POST["reg"];
          $class=$_POST['class'];
			$date=$_POST["date"];
			$time=$_POST["time"];
			$present_stat=$_POST["present_stat"];

		$qr="INSERT INTO attendance_log (institute_id, rfid, regno, class, date1, time1, present_stat,msg_stat) VALUES('$inst_id','$rfid','$reg', '$class', '$date','$time','$present_stat','')";
		$s=mysqli_query($con,$qr);
		if($s)
		{
			?>
			<script type="text/javascript">
			alert('Success: Succesfully Added!!!');
			location.href="http://localhost/wordpress/attendance-editor/";
		</script>
		<?php
		}
		else{
			?>
			<script type="text/javascript">
			alert('Error: Unsuccessful!!!');
			location.href="http://localhost/wordpress/attendance-editor/";
		</script>
		<?php
		}
		}
