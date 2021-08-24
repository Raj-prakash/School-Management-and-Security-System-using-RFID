$con=$_SESSION['con'];
	if(isset($_POST['reg']) && isset($_POST['select']))
{
	$un=$_POST["reg"];
	$_SESSION['reg']=$un;
	$sel1=$_POST["select"];
	$_SESSION['sel']=$sel1;
	$con=mysqli_connect('localhost','root','','worry_less');	
}
$reg=$_SESSION['reg'];
$sel=$_SESSION['sel'];
	switch ($sel) 
    {
		case 'Parent':
        if(isset($_POST['but']))
        {
        $but_value=$_POST['but'];
			if($but_value=='update') { 

				$stud_id=$_POST["stud_id"];
				$pass=$_POST["password"];
				$sql1="update login_parent set password='$pass' where stud_id='$stud_id'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Updated the Parent Access Details!!")';
echo '</script>';
                                  
				}
		
				}
       else if($but_value=='delete')
        {   
				$stud_id=$_POST["stud_id"];
				
				$sql1="delete from login_parent where stud_id='$stud_id'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Deleted Parent Access Details!!")';
echo '</script>';
                  echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>';
                  
				}
        }
        }
			$sql="SELECT * FROM login_parent WHERE stud_id='$reg'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);
			?>
			<form method="POST">
			<table border="1">
				<tr>
	  				<th>Student ID</th>
	 				<th>Password</th>
					<th colspan="2">Update/Delete</th>	 			
	 			</tr>
	 			<tr>
	 				<td><input type="text" name="stud_id" value="<?php echo $row['stud_id']; ?>" readonly></td>
	 				<td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
	 				<td colspan="2"><button type="submit" name="but" value="update">Update</button>
	 					<button type="submit" name="but" value="delete" >Delete</button></td>
	 			</tr> 
			</table>
			
</form>
<?php
break;
        //case for staff
 case 'Staff':	

		if(isset($_POST['but']))
        {
        $but_value=$_POST['but'];
			if($but_value=='update') { 

				$staff_id=$_POST["staff_id"];
				$pass=$_POST["pass"];
				$sql1="update login_teacher set pass='$pass' where staff_id='$staff_id'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Updated the Staff Access Details!!")';
echo '</script>';
                  
				}
		
				}
       else if($but_value=='delete')
        {   
				$staff_id=$_POST["staff_id"];
				
				$sql1="delete from login_teacher where staff_id='$staff_id'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Deleted Staff Access Details!!")';
echo '</script>';
                  echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>';
				}
        }
        }
			$sql="SELECT * FROM login_teacher WHERE staff_id='$reg'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);
			?>
			<form method="POST">
			<table border="1">
				<tr>
	 				<th>Institute ID</th>
	 				<th>Staff ID</th>
	 				<th>Password</th>
					<th colspan="2">Update/Delete</th>	 			
	 			</tr>
	 			<tr>
	 				<td><input type="text" name="inst_id" value="<?php echo $row['inst_id']; ?>" readonly></td>
	 				<td><input type="text" name="staff_id" value="<?php echo $row['staff_id']; ?>" readonly></td>
	 				<td><input type="text" name="pass" value="<?php echo $row['pass']; ?>"></td>
	 				<td colspan="2"><button type="submit" name="but" value="update">Update</button><button type="submit" name="but" value="delete">Delete</button></td>
	 			</tr> 
			</table>
							
			</form>
			<?php
			
			break;
        
        //case for developers
        case 'Developer':

		if(isset($_POST['but']))
        {
        $but_value=$_POST['but'];
			if($but_value=='update') { 

				$username=$_POST["username"];
				$password=$_POST["password"];
				$sql1="update dev_login set password='$password' where username='$username'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Updated the Developer Access Details!!")';
echo '</script>';
                  
				}
		
				}
       else if($but_value=='delete')
        {   
				$username=$_POST["username"];
				
				$sql1="delete from dev_login where username='$username'";
				$res1=mysqli_query($con,$sql1);
				if($res1)
				{
					echo '<script language="javascript">';
echo 'alert("Successfully Deleted Developer Access Details!!")';
echo '</script>';
                 echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>'; 
				}
        }
        }
			$sql="SELECT * FROM dev_login WHERE username='$reg' ";
			
			$result=mysqli_query($con,$sql);

			$row=mysqli_fetch_assoc($result);
			?>
			<form method="POST">
			<table>
				<tr>
	 				<th>Developer Id</th>
	 				<th>Password</th>
					<th colspan="2">Update/Delete</th>	 			
	 			</tr>
	 			<tr>
	 				
	 				<td><input type="text" name="username" value="<?php echo $row['username']; ?>" readonly></td>
	 				<td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
	 				<td colspan="2"><button type="submit" name="but" value="update">Update</button><button type="submit" name="but" value="delete">Delete</button></td>
	 			</tr> 
			</table>
				
		
			</form>

			<?php
			
			break;
    }
