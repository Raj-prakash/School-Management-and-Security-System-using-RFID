if(isset($_POST['min_time']) && isset($_POST['max_time']) && isset($_POST['date'])  )
  {
  $_SESSION['min']=$_POST["min_time"];
  $_SESSION['max']=$_POST["max_time"];
  $_SESSION['date']=$_POST['date'];
}
$min=$_SESSION['min'];
$max=$_SESSION['max'];
$date=$_SESSION['date'];
  $con=$_SESSION['con'];
    $sql="SELECT * FROM attendance_log WHERE date1='$date' AND time1>='$min'  AND time1<='$max'";
    $result=mysqli_query($con,$sql);
    $count=mysqli_affected_rows($con);

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
