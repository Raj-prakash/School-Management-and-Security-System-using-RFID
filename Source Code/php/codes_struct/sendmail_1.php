<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />
<title>WorryLess | EMAIL SENDER</title>
<!-- TemplateEndEditable -->
<link rel="shortcut icon" href="Grace School Management/LogoMakr_5ui4An.png"  type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" />
<style>
footer{background-color:Black;height:35px; font-family:Arial, Helvetica, sans-serif; color:#FFFFFF; font-size:20px; position:fixed;left:5%; bottom:0; width:90%; border-bottom-color:#62ADDB; border-radius:5px;}

</style>
</head>
<body>
<div class="container-fluid">
<header>
<div style="float:center">
<p style="padding-top:1%; font-size:26px; padding-right:16%;">WorryLess</p>
</div>
</header></div>
<hr style="color:#000000; border-width:thick;" ></hr>
<center>
    <div class="form-group container-fluid" style="width:500px;">
<form method="post" enctype="multipart/form-data">
<h3>
Enter your E-mail ID<br>
<input type="text" name="email" class="form-control" placeholder="your_mail_id@example.com" required><br>
Subject<input type="text" name="sub" class="form-control" placeholder="Doubth!!.. etc.." required><br>
Message Content<br>
<textarea type="textarea" class="form-control" name="msg" placeholder="Enter your message" cols="30" rows="4" required></textarea><br>
<button type="submit" name="send" class="form-control btn-info">Send E-Mail</button>
</h3>
</form>
</div>
</center>


<?php
if(isset($_POST['send']))
{
	$to="worrylessrfid@gmail.com";
	$email=$_POST['email'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];	
	$full_msg="Sender: ".$email." Message Content: ".$msg;
	/**
	$headers="MIME-Version: 1.0" . "\r\n";
	$headers.="Content-type:text/html;charset=UTF-8"."\r\n";
	$headers="From: worrylessrfid@gmail.com" . "\r\n" . "CC: mr.rahulksingh@gmail.com";
	**/
	require 'PHPMailerAutoload.php';
	require 'credential.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 4;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = EMAIL;                     // SMTP username
    $mail->Password   = PASS;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom(EMAIL, 'Worry Less');
    $mail->addAddress($to);     // Add a recipient
  //  $mail->addReplyTo('info@example.com', 'Information');
    
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $full_msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<center><label class=alert-success>The EMAIL was sent successfully!!!</label></center>';
} catch (Exception $e) {
    echo "<center><label class=alert-danger>The EMAIL wasn't sent!!!. Mailer Error: {$mail->ErrorInfo}</label></center>";
}
}
session_start();
if(!empty($_SESSION['url']))
{
$url=$_SESSION['url'];
}
?>

<center>
<div style="width:300px">
<form action=<?php echo $url; ?> >
<button class="form-control alert-danger">Go Back To Where You Left!!!!</button> 

</form>
</div>
</center>
<footer style="text-align:center">
<p style="padding-bottom:10px;">Developed By: Rahulkumar Singh, A.Raja Mathiyazhagan, S.Yogesh, H.Mohamed Rizwan</p>
</footer>

</body>
</html>
