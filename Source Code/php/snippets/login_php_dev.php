$con=$_SESSION['con'];
$uname = $_POST['dev_id'];
$qry="SELECT * FROM dev_login WHERE username='$uname'";
$result = mysqli_query($con,$qry);
$_SESSION['logged_in'] = false;
if ( $result->num_rows == 0 ){ // User doesn't exist
echo '<script language="javascript">';
   echo 'alert("The user with that ID does not exist!!");';
echo 'window.location.href = "http://localhost/wordpress/developer-login/";';
  echo '</script>';
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( $_POST['pass']==$user['password'])  {
       
         $_SESSION['logged_in'] = true;
      echo '<script language="javascript">';
      echo 'window.location.href = ""http://localhost/wordpress/institute-database-viewer-editor/;';
      echo '</script>'; 
    }
    else {
	 echo '<script language="javascript">';
       echo 'alert("Opps!! You have entered a wrong password");';
		echo 'window.location.href = "http://localhost/wordpress/developer-login/";';
      echo '</script>';
    }
}
