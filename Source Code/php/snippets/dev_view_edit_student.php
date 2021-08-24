$con=$_SESSION['con'];
if(isset ($_POST['but1']))
{
  $but1=$_POST['but1'];
 $regno=$_POST['regno'];
  if($but1=="update")
  {
  $rfid_no=$_POST['rfid'];
   $class=$_POST['class'];
  $name=$_POST['sname'];
  $section=$_POST['section'];
  $f_m_name=$_POST['fname'];
  $address=$_POST['address'];
  $con_no=$_POST['no'];
  $mail=$_POST['email'];
  $qry="update student_master set rfid='$rfid_no', name='$name', class='$class', section='$section', f_m_name='$f_m_name', address='$address', contact_no='$con_no', email_id='$mail' where regno='$regno'";
  $result=mysqli_query($con,$qry);
  if($result)
  {
   echo '<script language="javascript">';
echo 'alert("Successfully Updated the Student Details")';
echo '</script>';
  }
  
  }
  else if($but1=="delete")
  {
    $qry="delete from student_master where regno='$regno'";
     $result=mysqli_query($con,$qry);
  if($result)
  {
    echo '<script language="javascript">';
echo 'alert("Successfully Deleted the Student Details!! Going back to the Student Selection Page!!");';
echo 'window.location.href = "http://localhost/wordpress/student-db-master/";';
echo '</script>';
  }
  
  }
}
$regno=$_POST["regno"];

$qry="select * from student_master where regno='$regno'";
			$result=mysqli_query($con,$qry);
  if($result)
   
  $row=$result->fetch_assoc();
  
  $rfid_no=$row['rfid'];
  $inst_id=$row['institute_id'];
  $class=$row['class'];
  $name=$row['name'];
  $section=$row['section'];
  $f_m_name=$row['f_m_name'];
  $address=$row['address'];
  $con_no=$row['contact_no'];
  $mail=$row['email_id'];



?>
  <form method="POST">
 <table>
<tr><td>Reg No:</td><td><input type="text" name="regno" readonly value='<?php echo $regno; ?>'>
</td></tr>

<tr><td>RFID No:</td><td><input type="text" name="rfid" value='<?php echo $rfid_no;?>'>
</td></tr>
  
<tr><td>Name:</td><td><input type="text" name="sname" value='<?php echo $name; ?>' autofocus required></td></tr>

<tr><td>Class:</td><td><input type="text" name="class"  value='<?php echo $class; ?>' required></td></tr>

<tr><td>Section:</td><td><input type="text" name="section" value='<?php echo $section; ?>' required></td></tr>
<tr><td>Father/Mother Name:</td><td><input type="text" name="fname" value='<?php echo $f_m_name; ?>' required></td></tr>



<tr><td>Contact No:</td><td><input type="tel" name="no" value='<?php echo $con_no; ?>' required></td></tr>

<tr><td>Address:</td><td><input type="text"  name='address' value='<?php echo $address; ?>' required></td></tr>

<tr><td>Email:</td><td><input type="email" name="email" value='<?php echo $mail; ?>' required></td></tr>

<tr>
<td coldspan="2"><center><button type="submit" value="update" name="but1">Update</button>
<a href="http://localhost/wordpress/student-db-master/"><button type="button" value="goback" name="but1">Go Back</button></a>
<button type="submit" value="delete" name="but1">Delete</button>
  </td>
  </tr></center>
</table>
</form>
