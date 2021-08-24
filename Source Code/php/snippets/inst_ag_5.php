if(isset($_POST['class']) && isset($_POST['date']))
  {
  $_SESSION['date']=$_POST["date"];
	$_SESSION['class']=$_POST["class"];
}
$class=$_SESSION['class'];
$date=$_SESSION['date'];
  
	$con=$_SESSION['con'];
//counting the total number of students in a class
  $qry1="select * from student_master where class='$class'";
  $res1=mysqli_query($con,$qry1);
  $count1=mysqli_affected_rows($con);
//Number of students present
  $qry2="select * from attendance_log where class='$class' AND present_stat='present' AND date1='$date'";  
  $res2=mysqli_query($con, $qry2);
  $row2=$res2->fetch_assoc();
  $count2=mysqli_num_rows($res2);

  $stud_ab=$count1-$count2;

  //querying the attendance log
    $sql="SELECT * FROM attendance_log WHERE class='$class' AND date1='$date'";
    $result=mysqli_query($con,$sql);
      ?>
      <h1>
        <center>
      <lable>Total Number of Students: <u><b><?php echo $count1; ?></b></u></lable></br>
      <lable>Number of Students Present: <u><b><?php echo $count2; ?></b></u></lable></br>
      <lable>Number of Students Absent: <u><b><?php echo $stud_ab; ?></b></u></lable></br>
        </center>
    </h1>
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
               while ( $row=mysqli_fetch_assoc($result))  
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
             <?php }  ?>
          
     </table>  
</h2>
