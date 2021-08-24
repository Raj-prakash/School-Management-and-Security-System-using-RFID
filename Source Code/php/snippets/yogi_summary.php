$con=$_SESSION['con'];
$uname=$_SESSION['uname'];
$sql="SELECT * FROM student_master where regno='$uname'";
$result=mysqli_query($con,$sql);
$row =$result->fetch_assoc();
?>
 <h2>
  <table>
			<tr>
				<td>RegNo:</td>
				<td><input type="text" value="<?php echo $row['regno']; ?>" readonly></td>
			</tr> 
			<tr>
				<td>Name:</td>
				<td><input type="text" value="<?php echo $row['name']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Class:</td>
				<td><input type="text" value="<?php echo $row['class']; ?>"  readonly></td>
			</tr>
			<tr>
				<td>Section:</td>
				<td><input type="text" value="<?php echo $row['section']; ?>"  readonly></td>
			</tr>
		
 </table>
                  </h2>
