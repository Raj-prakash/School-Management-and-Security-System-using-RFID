$con=$_SESSION['con'];
$reg=$_SESSION['uname'];
$qry1="select * from attendance_log where regno='$reg' order by date1 DESC";
$result1=mysqli_query($con,$qry1);
$row1=$result1->fetch_assoc();
//script for working days
$qry2="select * from inst_working_days where institute_id='".$row1['institute_id']."'";
$result2=mysqli_query($con,$qry2);
$row2=$result2->fetch_assoc();
$working_days=$row2['working_days'];
//script for days present
$qry3="select * from attendance_log where rfid='".$row1['rfid']."' AND present_stat='present'";
$result3=mysqli_query($con,$qry3);
$present_count=mysqli_affected_rows($con);
//script for absent days
$absent_count=$working_days-$present_count;
//script for attendance percentage
$percentage=($present_count*100)/$working_days;
?>
 <div>
  <h2>
<table>
<tr>
<td>RFID Number:</td>
<td><b><u><lable><?php echo $row1['rfid']; ?></lable></u></b></td>
<td>Date:</td>
<td><b><u><lable><?php echo $row1['date1']; ?></lable></u></b></td>
</tr>
  <tr><td>Time:</td>
<td><b><u><lable><?php echo $row1['time1']; ?></lable></u></b></td>
<td>Message Status:</td>
<td><b><u><lable><?php echo $row1['msg_stat']; ?></lable></u></b></td>
</tr>
  <tr>
	<td>No. of Working Days</td>
	<td><b><u><lable><?php echo $working_days; ?></lable></u></b></td>
	<td>Days Present</td>
	<td><b><u><lable><?php echo $present_count; ?></lable></u></b></td>
	</tr><tr><td>Days Absent</td>
	<td><b><u><lable><?php echo $absent_count; ?></lable></u></b></td>
	<td>Attendance Percentage</td>
	<td><b><u><lable><?php echo $percentage; ?>%</lable></u></b></td>
</tr>
</table>
  </h2>
      </div>
