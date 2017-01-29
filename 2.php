<?php
error_reporting(0);
$to = $_GET["to"];
$from = $_GET["from"];
guide($to,$from);
echo "Sure! Follow Me!!";
function guide($to, $from)
{
	include('config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sql = "select * from floorplan where L='$to' or R='$to';";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$tfloor=$row['floor'];
$sql2 = "select * from floorplan where L='$from' or R='$from';";
$result=mysqli_query($conn,$sql2);
$row1 = mysqli_fetch_array($result);
$ffloor=$row1['floor'];
$n = strlen($to);
$sub = substr($row['west'],0,$n);
if($sub == $to)
{
	$dir = substr($row['west'],$n,1);
}	
else
{
	$dir = substr($row['east'],$n,1);
}
$n = strlen($from);
$sub = substr($row1['west'],0,$n);
if($sub == $from)
{
	$dir1 = substr($row1['west'],$n,1);
}	
else
{
	$dir1 = substr($row1['east'],$n,1);
}
$ones = array("", "first", "second", "third", "fourth", "fifth", "sixth", "seventh", "eight", "ninth");
$tens = array("", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninty");
$spc = array("", "eleventh", "twelveth", "thirteenth", "fourteenth", "fifteenth", "sixteenth", "seventeenth", "eighteenth", "nineteenth");
$fst = array("", "tenth", "twentieth", "thirtieth", "fortieth", "fiftieth", "sixtieth", "seventieth", "eightieth", "ninetieth");
if(($row['L/R'] == "L" && $row1['L/R'] == "L") || ($row['L/R'] == "R" && $row1['L/R'] == "R"))
{
if($tfloor == $ffloor)
{
	if($row['id'] == $row1['id'])
	{
		echo "It should be opposite you.";
	}
	else if($row['id'] < $row1['id'] && $dir==0 && $dir1==0)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your left.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your left.";
		}
	}
	else if($row['id'] > $row1['id'] && $dir==0 && $dir1==0)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your right.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your right.";
		}
	}
	else if($row['id'] > $row1['id'] && $dir==1 && $dir1==1)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your left.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your left.";
		}
	}
	else if($row['id']< $row1['id'] && $dir==1 && $dir1==1)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your right.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your right.";
		}	
	}
	else if($row['id']< $row1['id'] && $dir==0 && $dir1==1)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your left.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your left.";
		}	
	}
	else if($row['id']> $row1['id'] && $dir==0 && $dir1==1)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your right.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your right.";
		}	
	}
	else if($row['id']< $row1['id'] && $dir==1 && $dir1==0)
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your right.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your right.";
		}	
	}
	else
	{
		if(abs($row['id']-$row1['id'])!=1)
		{
			echo "It is ".abs($row['id']-$row1['id'])." shops to your left.";
		}
		else
		{
			echo "It is ".abs($row['id']-$row1['id'])." shop to your left.";
		}	
	}
}
else{
	echo "It is on Level ".$tfloor.". ";
	$sql3 = "select * from floorplan where floor='$ffloor' and L='E1' or R='E1';";
	$result=mysqli_query($conn,$sql3);
	$row2 = mysqli_fetch_array($result);
	$sql3 = "select * from floorplan where floor='$ffloor' and L='E2' or R='E2';";
	$result=mysqli_query($conn,$sql3);
	$row4 = mysqli_fetch_array($result);
	$et;
	if($row2['L/R'] == "L")
	{
		if($dir == 1)
		{
			if(abs($row1['id']-$row2['id'])<abs($row1['id']-$row4['id']))
			{
				if($row1['id']>$row2['id'])
				{
					echo "Take the elevator to your right.";
					$et = 1;
				}
				else
				{
					echo "Take the elevator to your left.";
					$et =1;
				}	
			}
			else
			{
				if($row1['id']<$row4['id'])
				{
					echo "Take the elevator to your left.";
					$et = 2;
				}
				else
				{
					echo "Take the elevator to your right.";
					$et = 2;
				}
			}	
		}
		else
		{
			if(abs($row1['id']-$row2['id'])<abs($row1['id']-$row4['id']))
			{
				if($row1['id']>$row2['id'])
				{
					echo "Take the elevator to your left.";
					$et = 1;
				}
				else
				{
					echo "Take the elevator to your right.";
					$et = 1;
				}	
			}
			else
			{
				if($row1['id']<$row4['id'])
				{
					echo "Take the elevator to your right.";
					$et = 2;
				}
				else
				{
					echo "Take the elevator to your left.";
					$et = 2;
				}
			}
		}
	}
	if($row2['L/R'] == "R")
	{
		if($dir == 0)
		{
			if(abs($row1['id']-$row2['id'])<abs($row1['id']-$row4['id']))
			{
				if($row1['id']>$row2['id'])
				{
					echo "Take the elevator to your left.";
					$et = 1;
				}
				else
				{
					echo "Take the elevator to your right.";
					$et = 1;
				}	
			}
			else
			{
				if($row1['id']<$row4['id'])
				{
					echo "Take the elevator to your right.";
					$et = 2;
				}
				else
				{
					echo "Take the elevator to your left.";
					$et = 2;
				}
			}	
		}
		else
		{
			if(abs($row1['id']-$row2['id'])<abs($row1['id']-$row4['id']))
			{
				if($row1['id']>$row2['id'])
				{
					echo "Take the elevator to your right.";
					$et = 1;
				}
				else
				{
					echo "Take the elevator to your left.";
					$et = 1;
				}	
			}
			else
			{
				if($row1['id']<$row4['id'])
				{
					echo "Take the elevator to your left.";
					$et = 2;
				}
				else
				{
					echo "Take the elevator to your right.";
					$et = 2;
				}
			}
		}
	}
		if($to == $row['L'])
		{
			if($et == 1 && ($row['id']>=$row2['id']))
			{
				if($row['id']==$row2['id'])
				echo "The shop is right in front of you.";
			if(abs($row['id']-$row2['id'])<10)
			{
				echo "The shop is ".$ones[abs($row['id']-$row2['id'])]." to your right.";
			}
			else if(abs($row['id']-$row2['id'])<20)
			{
				echo "The shop is ".$spc[abs($row['id']-$row2['id'])]." to your right.";
			}
			else if(abs($row['id']-$row2['id'])/10!=0)
			{
				echo "The shop is ".$fst[abs($row['id']-$row2['id'])]." to your right.";
			}
			else
			{
				echo "The shop is ".$tens[abs($row['id']-$row2['id'])/10]." ".$ones[abs($row['id']-$row2['id'])%10]." to your right.";
			}
		}
		else if($et == 2 && ($row['id']>=$row4['id']))
		{
			if($row['id']==$row4['id'])
				echo "The shop is right in front of you.";
			else if(abs($row['id']-$row4['id'])<10)
			{
				echo "The shop is ".$ones[abs($row['id']-$row4['id'])]." to your right.";
			}
			else if(abs($row['id']-$row4['id'])<20)
			{
				echo "The shop is ".$spc[$abs($row['id']-$row4['id'])]." to your right.";
			}
			else if(abs($row['id']-$row4['id'])/10!=0)
			{
				echo "The shop is ".$fst[abs($row['id']-$row4['id'])]." to your right.";
			}
			else
			{
				echo "The shop is ".$tens[abs($row['id']-$row4['id'])/10]." ".$ones[abs($row['id']-$row4['id'])%10]." to your right.";
			}
		}
		else 
		{
			if($row['id']==$row4['id'])
				echo "The shop is right in front of you.";
			else if(abs($row['id']-$row4['id'])<10)
			{
				echo "The shop is ".$ones[abs($row['id']-$row4['id'])]." to your left.";
			}
			else if($row['id']<20)
			{
				echo "The shop is ".$spc[abs($row['id']-$row4['id'])]." to your left.";
			}
			else if($row['id']/10!=0)
			{
				echo "The shop is ".$fst[abs($row['id']-$row4['id'])]." to your left.";
			}
			else
			{
				echo "The shop is ".$tens[abs($row['id']-$row4['id'])/10]." ".$ones[abs($row['id']-$row4['id'])%10]." to your left.";
			}
		}
		}
		else if($row['L'] == $row['R'])
		{
			echo "It should be right in front of you.";
		}
		else
		{
			if($et == 1 && ($row['id']>=$row2['id']))
			{
			if($row['id']==$row2['id'])
				echo "The shop is right in front of you.";
			else if(abs($row['id']-$row2['id'])<10)
			{
				echo "The shop is ".$ones[abs($row['id']-$row2['id'])]." to your left.";
			}
			else if(abs($row['id']-$row2['id'])<20)
			{
				echo "The shop is ".$spc[abs($row['id']-$row2['id'])]." to your left.";
			}
			else if(abs($row['id']-$row2['id'])/10!=0)
			{
				echo "The shop is ".$fst[abs($row['id']-$row2['id'])]." to your left.";
			}
			else
			{
				echo "The shop is ".$tens[abs($row['id']-$row2['id'])/10]." ".$ones[abs($row['id']-$row2['id'])%10]." to your left.";
			}
		}
		else if($et == 2 && ($row['id']>=$row4['id']))
		{
			if($row['id']==$row4['id'])
				echo "The shop is right in front of you.";
			else if(abs($row['id']-$row4['id'])<10)
			{
				echo "The shop is ".$ones[abs($row['id']-$row4['id'])]." to your left.";
			}
			else if(abs($row['id']-$row4['id'])<20)
			{
				echo "The shop is ".$spc[abs($row['id']-$row4['id'])]." to your left.";
			}
			else if(abs($row['id']-$row4['id'])/10!=0)
			{
				echo "The shop is ".$fst[abs($row['id']-$row4['id'])]." to your left.";
			}
			else
			{
				echo "The shop is ".$tens[abs($row['id']-$row4['id'])/10]." ".$ones[abs($row['id']-$row4['id'])%10]." to your left.";
			}
		}
		else 
		{
			if($row['id']==$row4['id'])
				echo "The shop is right in front of you.";
			else if(abs($row['id']-$row4['id'])<10)     
			{                                           
				echo "The shop is ".$ones[abs($row['id']-$row4['id'])]." to your right.";
			}                                           
			else if($row['id']<20)                      
			{                                           
				echo "The shop is ".$spc[abs($row['id']-$row4['id'])]." to your right.";
			}                                           
			else if($row['id']/10!=0)                   
			{                                           
				echo "The shop is ".$fst[abs($row['id']-$row4['id'])]." to your right.";
			}                                           
			else                                        
			{                                           
				echo "The shop is ".$tens[abs($row['id']-$row4['id'])/10]." ".$ones[abs($row['id']-$row4['id'])%10]." to your right.";
			}                                           
		}                                               
		}                                               
	}                                                   
}                                                       
else                                                    
{                                                       
	echo "Please move back to the entrance. ";          
	//$dec = $_GET["dec"];                              
	//if($dec == "yes")                                 
	//{                                                 
		if($row['L/R']=="L" && $row1['L/R']=="R")       
		{                                               
			echo "Please proceed to GPX which is situated to the center once you enter the left wing. ";
			guide($to, "GPX");                          
		}                                               
		else if($row['L/R']=="R" && $row1['L/R']=="L")  
		{                                               
			echo "Please proceed to New Bridge which is situated to your right once you enter the right wing. ";
			guide($to, "New Bridge");                    
		}                                               
		else                                            
		{                                               
			echo "Your destination has arrived.";       
		}                                               
	//}                                                 
	                                                    
}                                                       
}                                                       
?>                                                      