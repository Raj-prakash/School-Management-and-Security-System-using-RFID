$con=$_SESSION['con'];
$inst_id=$_POST['inst_id'];
$inst_name=$_POST['inst_name'];
$connum=$_POST['connum'];
$address=$_POST['address'];
$email=$_POST['email'];



$qry="insert into institute_master values('$inst_id', '$inst_name', '$connum', '$address', '$email')";
$result=mysqli_query($con, $qry);
if($result)
{
  echo '<script language="javascript">';
   echo 'alert("The details were inserted successfully to the Database!! Return to the Viewer/Editor Page");';
echo 'window.location.href = "http://localhost/wordpress/institute-database-viewer-editor/";';
  echo '</script>';
