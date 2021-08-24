<?php
   // Connect to database
$dbname="worry_less";
$host="localhost";
$user="root";
$pwd="";
$con=mysqli_connect($host,$user,$pwd,$dbname);

$url=$_SERVER['REQUEST_URI'];
header("Refresh: 2; URL=$url");  // Refresh the webpage every 5 seconds
//getting unsent details from table
$qry1="select * from attendance_log where msg_stat='' limit 1";
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_assoc($res1);
//getting the contact details
$rfid_No=$row1['rfid'];
$d_arr=$row1['date1'];
$t_arr=$row1['time1'];

$qry2="select * from student_master where rfid='$rfid_No'";
$res2=mysqli_query($con,$qry2);

$row2=mysqli_fetch_assoc($res2);
$phone_number=$row2['contact_no'];
echo "number:".$phone_number;
$name=$row2['name'];
$class=$row2['class'];

//coding to send sms
if(!empty($phone_number))
{
// Account details
    $apiKey = urlencode('omVQqMD9jUw-WDfGwL1uHDkEtQDhAAhsbMyLUU9BPe');
    
    // Message details
    //$numbers = array(917010375918, 917010375918);

    $sender = urlencode('TXTLCL');
    $message = rawurlencode('Your child, '.$name.', studying in class '.$class.' have reached the school premises. Arrival date:'.$d_arr.' Arrival time:'.$t_arr);
 
    //$numbers = implode(',', $numbers);
   // $numbers='917010375918';
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $phone_number, "sender" => $sender, "message" => $message);
 
    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Process your response here
    echo $response;

$phone_number=NULL;
$qry3="update attendance_log set msg_stat='sent' where rfid='$rfid_No' && date1='$d_arr' && time1='$t_arr'";
$res=mysqli_query($con,$qry3);
}
?>
<html>
<head>
    <title>RFID</title>
</head>
    <body>
        <h1>RFID Numbers</h1>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td>RFID NO.</td>
             <td>Message Status</td>
           
      </tr>
      
<?php
 
   // IMPORTANT: If you are using XAMPP you will have to enter your computer IP address here, if you are using webpage enter webpage address (ie. "www.yourwebpage.com")
    //$con=mysqli_connect("192.168.43.177","root","","worry_less");
       
    // Retrieve all records and display them   
    $result = mysqli_query($con,'SELECT * FROM attendance_log');
      
    // Process every record
    
    while($row = mysqli_fetch_array($result))
    {      
        echo "<tr>";
        echo "<td>" . $row['rfid'] . "</td>";
        echo "<td>" . $row['msg_stat']. "</td>";
        echo "</tr>";
        
    }
        

    // Close the connection   
    mysqli_close($con);
?>
    </table>
    </body>
</html>
