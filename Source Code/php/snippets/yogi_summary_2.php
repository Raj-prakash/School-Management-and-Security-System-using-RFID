$con=$_SESSION['con'];
$uname=$_SESSION['uname'];
$sql="SELECT * FROM student_master where regno='$uname'";
$result=mysqli_query($con,$sql);
$row =$result->fetch_assoc();
?>
 <h2> 
 <table>
 <tr>
				<td>Father/Mother Name:</td>
				<td><input type="text" value="<?php echo $row['f_m_name']; ?>"  readonly></td>
			</tr>
			<tr>
				<td>Contact No:</td>
				<td><input type="'tel" value="<?php echo $row['contact_no']; ?>"  readonly></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="" value="<?php echo $row['address']; ?>"  readonly></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="Email" name="" value="<?php echo $row['email_id']; ?>"  readonly></td>
			</tr>
                 
</table></h2>
