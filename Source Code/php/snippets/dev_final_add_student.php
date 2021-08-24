$no=$_POST['add_no'];
$_SESSION['add_no']=$no;
for($i=1; $i<=$no; $i++)
 {
   echo "<center><h1><b>Student ".$i."</b></h1></center>";
?>
<form method="POST" action="http://localhost/wordpress/dev-final-student-add/">  
  <table>
  <tr>
  <td>Institute ID</td>
<td><input type="text" placeholder="eg: GRA101" required autofocus name="inst_id<?php echo $i;?>"></td>
</tr>
  <tr>
  <td>RFID No</td>
<td><input type="text" placeholder="eg: A1 61 41 9E F8" required autofocus name="rfid_no<?php echo $i;?>"></td>
</tr>
<tr>
<td>Registration No</td>
<td><input type="text" placeholder="eg: A161419" required name="reg_no<?php echo $i;?>"></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" placeholder="eg: Rahulkumar Singh" required name="sname<?php echo $i;?>" class="form-control"></td>
</tr>
<tr>
<td>Class</td>
<td><input type="text" placeholder="eg: 3, 5, 7" required name="class<?php echo $i;?>"></td>
</tr>
<tr>
<td>Section</td>
<td><input type="text" placeholder="eg: A, B, C...." name="sec<?php echo $i;?>" required></td>
</tr>
<tr>
<td>Father/Mother Name</td>
<td><input type="text" required placeholder="Chandan Kumar Singh" name="f_m_name<?php echo $i;?>"></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" placeholder="eg: house no, str name, city name, state name," required name="address<?php echo $i;?>"></td>
</tr>
<tr>
<td>Contact Number</td>
<td><input type="tel" placeholder="eg: 7010375918" required name="connum<?php echo $i;?>"></td>
</tr>
<tr>  
<td>Email</td>
<td><input type="text" placeholder="eg: mr.rahulksingh@gmail.com" required name="email<?php echo $i;?>"></td>
</tr>
 </table> 
  

   <?php
}
?>
  <center><button value="but" name="but" type="submit">Add Students</button></center><br>
 </form>
