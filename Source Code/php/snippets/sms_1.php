?>
<form method="POST">
	<h2>
		<table>
			<tr>
				<td>Enter Regd. No.</td>
				<td><input type="text" name="regd"></td>
				<td>OR</td>
				<td>Enter RFID No.</td>
				<td><input type="text" name="rfid"></td>
				<td>OR</td>
				<td>Enter Contact No.</td>
				<td><input type="text" name="contact"></td>
			</tr>
			<tr>
				<td colspan="4">Enter the Message Content</td>
				<td colspan="4"><input type="text" name="msg"></td>
			</tr>
			<tr>
				<td colspan="8"><center><button type="submit">Send SMS</button></center></td>
			</tr>
		</table>
		
	</h2>
</form>
  <?php
$con=$_SESSION['con'];
if(isset($_POST['regd']) && isset($_POST['msg']))
{
  $regd=$_POST['regd'];
  $msg=$_POST['msg'];
	$qry1="select contact_no from student_master where regno='$regd'";
	$res1=mysqli_query($con,$qry1);
 	$row1=$res1->fetch_assoc();
	$phone_number=$row1['contact_no'];
  if(!empty($phone_number))
  {
	send_sms($phone_number, $msg);
  }
  $phone_number="";
  $msg="";
}
if(isset($_POST['rfid']) && isset($_POST['msg']))
{
  $rfid=$_POST['rfid'];
  $msg=$_POST['msg'];
	$qry1="select contact_no from student_master where rfid='$rfid'";
	$res1=mysqli_query($con,$qry1);
 	$row1=$res1->fetch_assoc();
	$phone_number=$row1['contact_no'];
	  if(!empty($phone_number))
  {
	send_sms($phone_number, $msg);
  }
  $phone_number="";
  $msg="";
}
if(isset($_POST['contact']) && isset($_POST['msg']))
{
  $contact=$_POST['contact'];
  $msg=$_POST['msg'];
    if(!empty($contact))
  {
	send_sms($contact, $msg);
  }
  $contact="";
  $msg="";
}


function send_sms($phone_number, $msg)
{
	echo "Phone Number:::".$phone_number."<br>";
	echo "Message Content::".$msg."<br>";
// Account details
    $apiKey = urlencode('omVQqMD9jUw-WDfGwL1uHDkEtQDhAAhsbMyLUU9BPe');
    
    // Message details
    $sender = urlencode('TXTLCL');
    $message = rawurlencode("".$msg);
    $data = array('apikey' => $apiKey, 'numbers' => $phone_number, "sender" => $sender, "message" => $message);
     // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
        // Process your response here
    echo "displaying:". $response;
}
