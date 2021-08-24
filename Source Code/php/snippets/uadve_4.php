?>
<h3>
<?php 
  
$con=$_SESSION['con'];
if(isset($_POST['select']) && isset($_POST['inst_name']))
{
		$_SESSION['sel']=$_POST["select"];
		$_SESSION['inst_name']=$_POST["inst_name"];
}
$sel=$_SESSION['sel'];
$inst_name=$_SESSION['inst_name'];
	$sql1="SELECT * FROM institute_master WHERE name='$inst_name'";
	$result1=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	$inst_id=$row1['institute_id'];

//group of conditional statements
if(isset($_POST['but']))
{
  	$but_value=$_POST['but'];
  
}


//end of conditional statements


		
		switch ($sel) 
		{
			//if adding new access details of a parent
            
			case 'Parent': 
            if($but_value=='add_parent')
	{
      
		$regd=$_POST['regd'];
      
		$parent_pass=$_POST['parent_pass'];
     
		$qry1="insert into login_parent values('$inst_id', '$regd', '$parent_pass')";
		$result2=mysqli_query($con,$qry1);
		if($result2)
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Inserted New Parent Access Details")';
			echo '</script>';
          echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>';
		}
	}
           
?>
<form method="POST">
	<table>
		<tr>
			<td>
				Students Regd.No.:
			</td>
			<td><input type="text" name="regd"></td>
		</tr>
		<tr><td>Password:</td><td><input type="Password" name="parent_pass"></td></tr>
		<tr><td colspan="2"><button type="submit" name='but' value="add_parent">Add Details</button></td></tr>
	</table>
</form>
<?php
break;
case 'Staff':
             if($but_value=='add_staff')
	{
       
		$id=$_POST['staff_id'];
		$staff_pass=$_POST['staff_pass'];
		$qry2="insert into login_teacher values ('$inst_id', '$id', '$staff_pass')";
		$result3=mysqli_query($con,$qry2);
		if($result3)
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Inserted New Staff Access Details")';
			echo '</script>';
          echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>';
		}
	}
            
            
          
            ?>
<form method="POST">
	<table>
		<tr>
			<td>
				Staff ID Number:
			</td>
			<td><input type="text" name="staff_id"></td>
		</tr>
		<tr><td>Password:</td><td><input type="Password" name="staff_pass"></td></tr>
		<tr><td colspan="2"><button type="submit" name='but' value="add_staff">Add Details</button></td></tr>
	</table>
</form>
<?php
break;
case 'Developer': 
              if($but_value=='add_dev')
	{
       
		$username=$_POST['username'];
		$password=$_POST['dev_pass'];
		$qry3="insert into dev_login values ('$username', '$password')";
		$result4=mysqli_query($con,$qry3);
		if($result4)
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Inserted New Developer Access Details")';
			echo '</script>';
          echo '<script language="javascript">';
          echo 'window.location.href = "http://localhost/wordpress/user-access-database-viewer-editor/";';
          echo '</script>';
		}
	}
            ?>
<form method="POST">
	<table>
		<tr>
			<td>
				Dev Username:
			</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr><td>Password:</td><td><input type="Password" name="dev_pass"></td></tr>
		<tr><td colspan="2"><button type="submit" name='but' value="add_dev">Add Details</button></td></tr>
	</table>
</form>
<?php
break;
}
?>
</h3>
