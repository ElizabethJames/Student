<?php
require_once('connect.php');
		  session_start();

  $_SESSION['var']=0;
$sql="SELECT * FROM student_login WHERE student_rollno=$_POST[rollnumber] AND student_password='$_POST[password]'";


$result=$connect->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		$_SESSION['var']=0;
		$_SESSION['key']=$_POST[rollnumber];
	echo $_SESSION['key'];

     
  if($row[login_attempt]==0)
	  { header('Location:firstprofile.php');
       }  
	else
		header('Location:HomeF.php');
		
    }
} else {
   
$_SESSION['var']=1;
header('Location:login.php');
}
$connect->close();


?>
