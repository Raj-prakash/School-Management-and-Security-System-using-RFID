?><h2>
<table>
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-based-on-rfid-number/">
				<table>
					<tr>
						<td>Generate by RFID No.:</td>
						<td><input type="text" name="rfid"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-based-on-date/">
				<table>
					<tr>
						<td>Generate Attendance Log Based on Date</td>
						<td><input type="date" name="date"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-based-on-to-from-date/">
				<table>
					<tr>
						<td>From Date:</td>
						<td><input type="date" name="fdate"></td>
					</tr>
					<tr>
						<td>To Date:</td>
						<td><input type="date" name="tdate"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-based-on-class-date/">
				<table>
					<tr>
						<td>Class:</td>
						<td><input type="text" name="class" placeholder="UKG, LKG, 1, 2,......10"></td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type="date" name="date"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-for-late-students/">
				<table>
					<tr>
						<td>Generate late students of class</td>
						<td><input type="text" name="class" placeholder="UKG, LKG, 1, 2,......10"></td>
					</tr>
					<tr>
						<td>Date</td>
						<td><input type="date" name="date"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<form method="POST" action="http://localhost/wordpress/attendance-generator-based-on-time/">
				<table>
                   <tr>
						<td>
						Date	
						</td>
						<td><input type="date" name="date"></td>
					</tr>
					<tr>
						<td>Minimum Time</td>
						<td><input type="time" name="min_time"></td>
					</tr>
					<tr>
						<td>Maximum Time</td>
						<td><input type="time" name="max_time"></td>
					</tr>
					<tr>
						<td colspan="2"><center><button type="submit">Generate Log</button></center></td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
	</table>
</h2>
