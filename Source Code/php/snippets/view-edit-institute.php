$con=$_SESSION['con'];
$inst_id=$_POST['but'];
if(isset($_POST["but1"]))
	{
  
  			$inst_id=$_POST['inst_id'];
        	$inst_name1=$_POST["inst_name"];	
			$tel1=$_POST["tel"];
			$address1=$_POST["address"];
  			$email1=$_POST["email"];
      
			$but_value=$_POST['but1'];
      if($but_value=="update")
      {
       		$qry="update institute_master set name='$inst_name1', contact_no='$tel1' ,address='$address1', email_id='$email1' where institute_id='$inst_id'";
			$s=mysqli_query($con,$qry);
        if($s)
  {
   echo '<script language="javascript">';
echo 'alert("Successfully Updated the Institute Details")';
echo '</script>';
  }
      }
      if($but_value=="delete")
      {
        
        $qry="delete from institute_master where institute_id='$inst_id'";
        $s=mysqli_query($con,$qry);
        if($s)
  {
    echo '<script language="javascript">';
echo 'alert("Successfully Deleted the Institute Details!! Going back to the Institute Selection Page!!");';
echo 'window.location.href = "http://localhost/wordpress/institute-database-viewer-editor/";';
echo '</script>';
  }
      }
			
    }
	$sql="SELECT * FROM institute_master where institute_id='$inst_id'";
	$result=mysqli_query($con,$sql);
	$row=$result->fetch_assoc();		
	$inst_name=$row["name"];	
	$tel=$row["contact_no"];
	$address=$row["address"];
	$email=$row["email_id"];
  
	 
?>
  <center>
		<form method="POST">
			

			<table>

				<tr>
					<td>Institute ID:</td>
					<td><input readonly type=" text" name="inst_id" value='<?php echo $inst_id; ?>'></td>
				</tr>

				<tr>
					<td>Institute Name:</td>
					<td><input type="text" name="inst_name" value='<?php echo $inst_name; ?>'></td>
				</tr>

				<tr>
					<td>Contact No:</td>
					<td><input type="text" name="tel" value='<?php echo $tel; ?>'></td>
				</tr>

				<tr>
					<td>Address:</td>
					<td><input type="text" name="address" value='<?php echo $address; ?>'></td>
				</tr>

				<tr>
					<td>Email:</td>
					<td><input type="Email" name="email" value='<?php echo $email; ?>'></td>
				</tr>
                      <tr>
                      <td colspan="2"><center>  
                      <button value="update" type="submit" name="but1">Update</button>
                      	<a href="http://localhost/wordpress/institute-database-viewer-editor/"><button value="go back" type="button">Go Back</button></a>
                      	<button value="delete" type="submit" name="but1">Delete</button></center></td>
                      </tr>
			</table>
                       </form>
	</center>
