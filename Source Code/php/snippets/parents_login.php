if(isset($_POST['but']))
{
  
  $con=$_SESSION['con'];
$uname = $_POST['stud_id'];
  $_SESSION['uname']=$uname;
$qry="SELECT * FROM login_parent WHERE stud_id='$uname'";
$result = mysqli_query($con,$qry);
  
$_SESSION['logged_in'] = false;
if ( $result->num_rows == 0 ){ // User doesn't exist
echo '<script language="javascript">';
   echo 'alert("The Student with that ID does not exist!!");';
echo 'window.location.href = "http://localhost/wordpress/parents-login/";';
  echo '</script>';
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( $_POST['pass']==$user['password'])  {
       
         $_SESSION['logged_in'] = true;
      echo '<script language="javascript">';
      echo 'window.location.href = "http://localhost/wordpress/student-summary/";';
      echo '</script>'; 
    }
    else {
     echo '<script language="javascript">';
       echo 'alert("Opps!! You have entered a wrong password");';
        echo 'window.location.href = "http://localhost/wordpress/parents-login/";';
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
<td>Student ID</td>
<td><input type="text" name="stud_id" required autofocus placeholder="eg: A161419"></td>
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
