if(isset($_POST['but']))
{
  $uname = $_POST['staff_id'];
  $con=$_SESSION['con']; 
$qry="SELECT * FROM login_teacher WHERE staff_id='$uname'";

$result = mysqli_query($con,$qry);
 $_SESSION['logged_in'] = false;
if ( $result->num_rows == 0 ){ // User doesn't exist
echo '<script language="javascript">';
   echo 'alert("The Staff with that ID does not exist!!");';
echo 'window.location.href = "http://localhost/wordpress/institute-login/";';
  echo '</script>';
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( $_POST['pass']==$user['pass'])  {
       
         $_SESSION['logged_in'] = true;
      $inst_id=$user['inst_id'];
      $_SESSION['inst_id']=$inst_id;
      $date=date("Y/m/d");
      $query1="select * from working_days_log where institute_id='$inst_id' AND date='$date'";
      $result1=mysqli_query($con,$query1);
      if($result1->num_rows == 0)
      {
       echo '<script language="javascript">';
      echo 'window.location.href = "http://localhost/wordpress/working-days-log/";';
      echo '</script>'; 
      }
      else
      {
      echo '<script language="javascript">';
      echo 'window.location.href = "http://localhost/wordpress/student-database-viewer-editor/";';
      echo '</script>'; 
      }
    }
    else {
	 echo '<script language="javascript">';
       echo 'alert("Opps!! You have entered a wrong password");';
		echo 'window.location.href = "http://localhost/wordpress/institute-login/";';
      echo '</script>';
    }
}
}

?>
  <center>
<div>
<form method="POST">
<table>
<tr>
<td>Staff ID</td>
<td><input type="text" name="staff_id" required autofocus placeholder="eg: CS101"></td>
</tr>
  <tr>
  <td>Password</td>
<td><input type="password" name="pass" required></td>
</tr>
  <tr>
  <td colspan="2"><button type="submit" value="Login" name="but">Login</button></td>
  </tr>
</table>
</form></div>
</center>
