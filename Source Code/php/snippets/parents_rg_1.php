$qry="";
$con=$_SESSION['con'];
$regno=$_SESSION['uname'];
if(isset($_POST['full']))
{
	$choice='1';
}
else if(isset($_POST['date']))
{
	$choice='2';
	$date=$_POST['date'];
}
else if (isset($_POST['fdate']) && isset($_POST['tdate'])) {
	# code...
	$choice='3';
	$fdate=$_POST['fdate'];
	$tdate=$_POST['tdate'];
	
}
else if (isset($_POST['late'])) {
	# code...
	$choice='4';
	$time='09:30:00';
}
else if (isset($_POST['ftime']) && isset($_POST['ttime']) && isset($_POST['date'])) {
	# code...
	$choice='5';
	$ftime=$_POST['ftime'];
	$ttime=$_POST['ttime'];
	$datee=$_POST['date'];
}
switch ($choice) {
	case '1':
		# code...
	$qry="select * from attendance_log where regno='$regno'";
		break;
	case '2':
	$qry="select * from attendance_log where date1='$date' && regno='$regno'";
	break;
	case '3':
	$qry="select * from attendance_log where date1>='$fdate' && date1<='$tdate' && regno='$regno'";
	break;
	case '4':
	$qry="select * from attendance_log where time1>'$time' && regno='$regno'";
	break;
	case '5':
	$qry="select * from attendance_log where time1>='$ftime' && time1<='$ttime' && regno='$regno' && date1='$datee'";
	break;
}

if(!empty($qry))
{
	$res=mysqli_query($con, $qry);
?>
<h2>
      <table>
          <tr>
              <th>Institute ID</th>     
               <th>RFID Number</th>
               <th>REGD. No.</th>
               <th>Date</th>
               <th>Time</th>
               <th>Present Status</th>
               <th>SMS Status</th>
          </tr>
          <?php 
               while ( $row=mysqli_fetch_assoc($res))  
               { ?>
                    
                    <tr>
                    <td> <?php echo $row['institute_id']; ?></td>
                      <td> <?php echo $row['rfid']; ?></td>
                      <td> <?php echo $row['regno']; ?></td>
                      <td> <?php echo $row['date1']; ?></td>
                      <td> <?php echo $row['time1']; ?></td>
                      <td> <?php echo $row['present_stat'];?></td>
                      <td> <?php echo $row['msg_stat']; ?></td>
                    </tr>
             <?php 
         }  }
         ?>
          
     </table>  
</h2>
<h2>
	<form method="POST">
		<table>
			<tr> 
				<td>Generate Full Card Scanned Report</td>
				<td><button type="submit" name="full">Click Here to Generate</button></td>
			</tr>
		</table></form>
		<form method="POST">
		<table>
				<tr>
				<td>Specific Date</td>
				<td><input type="date" name="date"></td>
			</tr><tr>
				<td colspan="2"><center><button type="submit">Generate Report</button></center></td>
			</tr>
		</table>
</form>
	<form method="POST">
		<table>
			<tr>
				<td>From Date</td>
				<td><input type="date" name="fdate"></td>
			</tr>
			<tr>
				<td>To Date</td>
				<td><input type="date" name="tdate"></td>
			</tr>
			<tr>
				<td colspan="2"><center><button type="submit">Generate Report</button></center></td>
			</tr>
		</table>
	</form>
	<form method="POST">
		<table>
	
			<tr>
				<td>How many time is my child late??</td>
				<td><button type="submit" name="late">Check it out!</button></td>
			</tr>
	</table></form>
	<form method="POST">
		<table>
	
			<tr>
				<td>Specific Date</td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr>
				<td>From Time</td>
				<td><input type="time" name="ftime"></td>
			</tr>
			<tr>
				<td>To time</td>
				<td><input type="time" name="ttime"></td>
			</tr>
			<tr>
				<td colspan="2"><center><button type="submit">Generate Report</button></center></td>
			</tr>

		</table>
	</form>
</h2>
