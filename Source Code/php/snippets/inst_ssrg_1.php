$con=$_SESSION['con'];
     ?>
<div>
	<form method="POST">
	<table>
		<tr><td><h2>Enter Registration Number</h2></td>
		<td><input type="text" name="regno"></td>
		 <td><button type="submit">Search</button></td>
		</tr>
	</table>
       </form>
</div>


<?php
$con=$_SESSION['con'];
if(isset($_POST['regno']))
{
	$_SESSION['regno']=$_POST['regno'];
	$regno=$_SESSION['regno'];
	$qry1="select * from student_master where regno='$regno'";
	$result1=mysqli_query($con,$qry1);
	$row1=$result1->fetch_assoc();
	if(empty($row1))
	{
		?>
		<script type="text/javascript">
			alert('Error: Student Not Found');
			location.href="http://localhost/wordpress/specific-student-report-generator/";
		</script>
		<?php
	}
	else
	{
?>
<h2>
	<center>
<table border="1">
	<tr>
		<td><form method="POST" action="http://localhost/wordpress/student-report-generator-by-date/">
			<table>
				<tr>
  					<td colspan="2"><label>Select a date to search</label></td>
  </tr><tr>
					<td>Date:</td>
					<td><input type="date" name="date" required></td>
				</tr>
				<tr>
					<td><button type=submit>Generate Report</button></td>
				</tr>
			</table>
		    </form>
		</td>
	</tr>

	

	<tr>
		<td>
			<form method="POST" action="http://localhost/wordpress/student-report-generator-between-dates/">
				<table>
					<tr>
                      <td colspan="2"><label>Select the range of date</label></td>
                      </tr>
                      <tr>
						<td>Date From:</td><td><input type="date" name="fdate"  required></td>
					
						<td>Date To:</td><td><input type="date" name="tdate" required></td>
					</tr><tr>
						<td ><button type=submit>Generate Report</button></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>

	<tr>
		<td>
			<form method="POST" action="http://localhost/wordpress/complete-student-report-generator/">
				<table>
				<tr><td>To generate full report click the button</td><td><button type=submit>Dispaly Full Report</button></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
</center>
</h2>
<?php
}
}
