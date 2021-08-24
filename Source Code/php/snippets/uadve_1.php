$con=$_SESSION['con'];
$sql='SELECT * FROM institute_master';
$result=mysqli_query($con,$sql);
?>
<h3>
<form method="POST" action=" http://localhost/wordpress/edit-user-access-based-on-id/">
  <table>
			<tr>
				<td >
				Field:<br><br>
					<select name="select">
						<option  value="Parent">Parent</option>
						<option value="Staff">Staff</option>
						<option value="Developer">Developer</option>
					</select><br><br>
				ID Number: <br><br>
					<input type="text" name="reg" required><br><br>
						<input type="submit" name="" value="Search">
                </td>
            </tr>
	</table>
</form>
</h3>
