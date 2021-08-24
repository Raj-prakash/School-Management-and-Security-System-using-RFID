$con=$_SESSION['con'];
$no=$_SESSION['add_no'];
for ($i=1; $i<=$no; $i++)
{
$rfid_no=$_POST['rfid_no'.$i];
$reg_no=$_POST['reg_no'.$i];
$inst_id=$_POST['inst_id'.$i];
$class=$_POST['class'.$i];
$sname=$_POST['sname'.$i];
$sec=$_POST['sec'.$i];
$f_m_name=$_POST['f_m_name'.$i];
$address=$_POST['address'.$i];
$connum=$_POST['connum'.$i];
$email=$_POST['email'.$i];
$qry="insert into student_master values('$inst_id', '$rfid_no', '$reg_no', '$sname', '$class', '$sec', '$f_m_name', '$address', '$connum', '$email')";
$result=mysqli_query($con, $qry);
if($result)
{
  echo '<script language="javascript">';
   echo 'alert("The details were inserted to the Database successfully!! Return to the Viewer/Editor Page");';
echo 'window.location.href = "http://localhost/wordpress/student-database-viewer-editor/";';
  echo '</script>';
}
    
}
