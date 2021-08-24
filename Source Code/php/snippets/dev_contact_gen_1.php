  
$qry="";
$con=$_SESSION['con'];
$qry1="select * from institute_master";
$res1=mysqli_query($con,$qry1);
?>
<h1><lable>Generate Students' Contact Details</lable></h1>
<form method="POST">
	<h2>
		<table>
			<tr>
				<td>Enter Regd. No.</td>
				<td><input type="text" name="regd"></td>
				<td>OR</td>
				<td>Enter RFID No.</td>
				<td><input type="text" name="rfid"></td>
			</tr>
			<tr>
				<td colspan="5"><center><button type="submit" name='stud'>Generate Contact</button></center></td>
			</tr>
		</table>
	</h2>
</form>
<h1><lable>Generate Institute's Contact Details</lable></h1>
<form method="POST">
	<h2>
		<table>
			<tr>
				<td>Select the Institute</td>
				<td><select name='sel'>
					<?php
					while($row=mysqli_fetch_array($res1))
					{
					echo "<option value=".$row['institute_id'].">".$row['institute_id']." - ".$row['name']."</option>";
					}
					?>
				</select></td>
				<td><button type="submit" name="inst">Generate Contact</button></td>
			</tr>
		</table>
	</h2>
</form>
<?php
if (isset($_POST['stud'])) {
	if (!empty($_POST['regd'])) {
	# code...
	$choice='1';
	$regno=$_POST['regd'];
	}
	else if (!empty($_POST['rfid'])) {
	# code...
	$choice='2';
	$rfid=$_POST['rfid'];
	}
}
else if (isset($_POST['inst'])) {
	$institute_id=$_POST['sel'];
	$choice='3';
}
switch ($choice) {
	case '1':
		# code...
	$qry="select f_m_name, address, contact_no, email_id from student_master where regno='$regno'";
		break;
		case '2':
		$qry="select f_m_name, address, contact_no, email_id from student_master where rfid='$rfid'";
		# code...
		break;
		case '3':
		# code...
		$qry="select * from institute_master where institute_id='$institute_id'";
		break;	
	default:
		# code...
		break;
}
if(!empty($qry)){
$res2=mysqli_query($con, $qry);
}
if (isset($_POST['stud'])) {
	?>
      <table>
		<tr>
			<td>Father/Mother Name</td>
			<td>Contact Number</td>
			<td>Address</td>
			<td>Email-ID</td>
		</tr>
		<tr>
		<?php
			while ($row2=mysqli_fetch_array($res2)) {
				echo "<td>".$row2['f_m_name']."</td>";
				echo "<td>".$row2['contact_no']."</td>";
				echo "<td>".$row2['address']."</td>";
				echo "<td>".$row2['email_id']."</td>";
			}
 
		?>
	</tr>
	</table>
	<?php
}
if (isset($_POST['inst'])) {
	?>
	<table>
		<tr>
			<td>Institute Name</td>
			<td>Contact Number</td>
			<td>Address</td>
			<td>Email-ID</td>
		</tr>
		<tr>
		<?php
			while ($row2=mysqli_fetch_array($res2)) {
				echo "<td>".$row2['name']."</td>";
				echo "<td>".$row2['contact_no']."</td>";
				echo "<td>".$row2['address']."</td>";
				echo "<td>".$row2['email_id']."</td>";
			}
  		?>
	</tr>
	</table>
          
	<?php
}
?>
  <hr></hr><hr></hr><hr></hr><hr></hr><hr></hr><hr></hr><hr></hr><hr></hr>
