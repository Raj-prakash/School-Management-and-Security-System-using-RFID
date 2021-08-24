$con=$_SESSION['con'];
if(isset($_POST['but']))
{
  if($_POST['but']=='yes')
  {
  $inst_id=$_SESSION['inst_id'];
  $date=date('Y/m/d');
  $qry1="insert into working_days_log values('$inst_id', '$date')";
  $result=mysqli_query($con,$qry1);
  if($result)
  {
  echo '<script language="javascript">';
  echo 'window.location.href = "http://localhost/wordpress/student-database-viewer-editor/";';
  echo '</script>'; 
  }
  else echo "not inserted";
  }
  else if ($_POST['but']=='no')
{
     echo '<script language="javascript">';
     echo 'window.location.href = "http://localhost/wordpress/student-database-viewer-editor/";';
     echo '</script>'; 
}
  }
?>
 <form method='post'>
  <center>
  <button value='yes' name='but' type="submit">Yes Mr.Computer</button>
  <button value='no' name='but' type="submit">No Mr.Computer</button>
  </center>
 </form>
