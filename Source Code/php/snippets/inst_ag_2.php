if(isset($_POST['rfid']))  
{
	$_SESSION['rfid']=$_POST["rfid"];
}
$rfid=$_SESSION['rfid'];
$con=$_SESSION['con'];

$qry1="select * from student_master where rfid='$rfid'";
$res1=mysqli_query($con, $qry1);
$row1=$res1->fetch_assoc();
?>
<h2>
<table>
  <tr>
    <td>Institute ID:</td>
    <td><label><u> <?php echo $row1['institute_id']; ?> </u></label></td>
    <td>RFID No.:</td>
    <td><label><u> <?php echo $row1['rfid']; ?> </u></label></td>
    <td>Regd. No.:</td>
    <td><label><u> <?php echo $row1['regno']; ?> </u></label></td>
  </tr>
  <tr>
    <td>Name:</td>
    <td><label><u> <?php echo $row1['name']; ?> </u></label></td>
    <td>Class:</td>
    <td><label><u> <?php echo $row1['class']; ?> </u></label></td>
    <td>Contact No.:</td>
    <td><label><u> <?php echo $row1['contact_no']; ?> </u></label></td>
  </tr>
</table>
<hr></hr><hr></hr><hr></hr><hr></hr><hr></hr><hr></hr><hr></hr>
<?php
    $sql="SELECT * FROM attendance_log WHERE rfid='$rfid'";
    $result=mysqli_query($con,$sql);
      ?>
      
      <table >
          <tr>
               <th>Date</th>
               <th>Time</th>
               <th>Present Status</th>
               <th>SMS Status</th>
          </tr>
          <?php 
               while ( $row=mysqli_fetch_assoc($result))  
               { ?>
                    
                    <tr>
                    	<td> <?php echo $row['date1']; ?></td>
                    	<td> <?php echo $row['time1']; ?></td>
                      <td> <?php echo $row['present_stat'];?></td>
                    	<td> <?php echo $row['msg_stat']; ?></td>
                    </tr>
             <?php }  ?>
          
     </table>  
	</h2>
