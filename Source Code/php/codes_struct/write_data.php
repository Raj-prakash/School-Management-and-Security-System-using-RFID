<?php

    // Prepare variables for database connection
   
    $dbusername = "root";  // enter database username, I used "arduino" in step 2.2
    $dbpassword = "";  // enter database password, I used "arduinotest" in step 2.2

    try{
$dbname="worry_less";
$host="localhost";
$user="root";
$pwd="";
$con=mysqli_connect($host,$user,$pwd,$dbname);
        if(!isset( $_GET['value'])){
            throw new Exception('value not found');
        }
        $value = $_GET["value"];
        $sql = "select * from student_master where rfid='$value'";
     $result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$inst_id=$row['institute_id'];
$regno=$row['regno'];
$class=$row['class'];
date_default_timezone_set("Asia/Kolkata");
$d1=date('Y/m/d');
$t1=date('H:i:s');
$p="present";
$q1="select * from attendance_log where rfid='$value' AND date1='$d1'";
$r1=mysqli_query($con,$q1);
$count=mysql_num_rows($r1);
$row1=$r1->fetch_assoc();
if(empty($row1))
{
  $sql2="insert into attendance_log (institute_id, rfid, regno, class, date1, time1, present_stat) values ('$inst_id','$value','$regno','$class', '$d1', '$t1', '$p')";
$res2=mysqli_query($con,$sql2); 
}
else
{
    $sql1="insert into attendance_log (institute_id, rfid, regno, class, date1, time1) values ('$inst_id','$value','$regno', '$class', '$d1', '$t1')";
$res=mysqli_query($con,$sql1);
}

    }
    catch (Exception $e){
        echo $e->getMessage();
    }


?>
