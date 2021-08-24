$con=$_SESSION['con'];
		$sql='SELECT * FROM institute_master';
		$result=mysqli_query($con,$sql);
	 ?>
       <form method="POST" action="http://localhost/wordpress/view-edit-institute/">
	 <table>
	 	 		<tr>
	 			<th>Institute ID</th>
	 			<th>Institute Name</th>
	 			<th>Operation</th>
	 		</tr>
	 	
	 		<?php
				$i=1;
$_SESSION['text']="hi iam sending something";
	 			while ($row=mysqli_fetch_array($result))
	 			{
                  
                echo '<tr>
				<td>'.$row['institute_id'].'</td>
				<td>'.$row['name'].'</td>
				<td> <button  type="submit" value='.$row['institute_id'].' name="but">View/Edit</button></td>
				</tr>';
                }
?>
</table>
  </form>]
