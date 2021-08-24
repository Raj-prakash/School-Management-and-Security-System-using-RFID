session_start();
if($_SESSION['logged_in']!=true)
{
  echo '<script language="javascript">';
   echo 'alert("Hello Sir.. Please login to gain access to the features provided by WorrLess!! Thank You :)");';
echo 'window.location.href = "http://localhost/wordpress/";';
  echo '</script>';
