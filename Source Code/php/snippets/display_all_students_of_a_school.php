$con=$_SESSION['con'];
$institute_id=$_SESSION['inst_id'];
$qry1="select * from student_master where institute_id='$institute_id'";
$result1=mysqli_query($con,$qry1);

echo "<center><h1 style='font-size:50px;'>".mysqli_affected_rows($con)."</h1></center>";
?>
  
<table>
	<tr><th>RFID No.</th><th>Regd. No.</th><th>Name</th><th>Class</th></tr>

<?php
while ($row=mysqli_fetch_array($result1))
{
	echo "<tr><td>".$row['rfid']."</td><td>".$row['regno']."</td><td>".$row['name']."</td><td>".$row['class']."</td></tr>";
  
}
?>
</table>
