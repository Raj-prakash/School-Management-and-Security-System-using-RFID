$time='09:30:00';
if(isset($_POST['class']) && isset($_POST['date']))
  {
  $_SESSION['date']=$_POST["date"];
  $_SESSION['class']=$_POST["class"];
}
$date=$_SESSION['date'];
$class=$_SESSION['class'];
  $con=$_SESSION['con'];
 $sql="SELECT * FROM attendance_log WHERE class='$class' AND  date1='$date' AND time1 > '09:30:00' AND present_stat='present'";

    $result=mysqli_query($con,$sql);
    $count=mysqli_affected_rows($con);

      ?>
      <h1><lable>Number of Students Late: <u><?php echo $count; ?></u></lable></h1>
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
