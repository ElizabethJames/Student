
<?php
session_start();
@$a= $_SESSION['var'];

?>
<html>
<head>
<title>Fr.C.R.I.T</title>
<meta charset="utf-8">
 

        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Fr. C. Rodrigues Institute of Technology. In Pursuit of Excellence.">
        <title>Fr. C. Rodrigues Institute of Technology.</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="sstyle.css">


	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Include js plugin -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!--[if IE 9]>
       <link href="css/ie.css" rel="stylesheet">
    <![endif]-->
        <!--[if IE 10]>
           <link href="css/ie.css" rel="stylesheet">
        <![endif]-->
        <!--[if IE 11]>
           <link href="css/ie.css" rel="stylesheet">
        <![endif]-->
        <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="owl-carousel/owl.transitions.css">
        <script src="jquery-1.9.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script scr="assets/owl-carousel/owl.carousel.js"></script>

<style>
form{
font-size: 16px;
padding: 9px;
height: auto;
font-family: 'Dosis', sans-serif;
}
body{
background: #E6E6E6;
width: auto;
padding: 10px;
}
input[type=text], input[type=password] {
border: 0.2vw solid #9bba6e;
border-radius: 0.5vw;
padding: 1vw 1vw;
width: 70%;
 opacity: 1;
font-size: 20px;
}
input[type=submit]{
padding: 1vw;
color: white;
width: 40%;
font-size: 20px;
border-radius: 12px;
background-color: #9bba6e;
opacity: 1;
}
input[type=submit]:hover {
    background-color: #FFD133;
}
.out{
margin-top: 190px;
opacity:0.8;
}
.footer {
  position: relative;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #e6eeff;
  text-align: center;
  font-size: 1.3em;
}

            .header-top{
                width:100%;
		height: 7vw;
            }
            .header-top img{
                width: 70px;
                margin-left: 20px;
            }
            .header-top .title{
                line-height: 28px;
                margin-top: 34px;
                color: #fff;
                font-size: 30px;
                word-spacing: 12px;
                
                margin-left: 40px;             
                float: left;
                font-family: 'Dosis', sans-serif;
                text-transform: capitalize;
                text-align: center;
                
            }
            .header-top .title2{
                line-height: 28px;
                margin-top: 40px;
                color: #fff;
                font-size: 35px;
                word-spacing: 12px;
                
                margin-left: 30px;             
                float: left;
                font-family: 'Dosis', sans-serif;
                text-transform: capitalize;
                text-align: center;
                
            }
        
.serif{
font-family: 'Dosis', sans-serif;
}
.error1{
font-family: Arial, Helvetica, sans-serif;
color: red;
margin-left:30%;
}
li:hover{ 
    background-color: #FFD133;
}
 p	{
  	font-family: 'Dosis', sans-serif;
	}
a	{ 
font-color: #FFD133;	
font-family: 'Dosis', sans-serif;
}

</style>
<script>
function val()
{
	var a=login_form.rollnumber.value;
	if(isNaN(a) || a.length<6)
document.getElementById("error").innerHTML="Invalid RollNo";
//alert("d");
else
	document.getElementById("error").innerHTML="";
	
}
</script>
</head>
<body>
<script>
window.onload=function()
{
	var b=1;
if (b==<?php echo $a ?>)
{document.getElementById('demo').innerHTML = 'Invalid password or username!'
<?php session_destroy();?>
}
else
{
document.getElementById('demo').innerHTML = ''	
}
}
</script>
 <div class="header" style="background: #9bba6e; padding-bottom: 10px;">
        <div class="container "> 
            <div class="header-top">
                <div style="float:left;display: inline-block;padding-left: 9vw">
                    <a class="navbar-brand visible-lg visible-md " href="#" style="height: 92px;">
                       <img src="fcritlogo.png" style="width: 5vw;height:5vw;float: left; ">
                    </a>
                </div>
                <div class="title visible-lg visible-md " style="float: left; display:inline-block;padding-left: 2px; " >
                    FR. C. RODRIGUES INSTITUTE oF TECHNOLOGY
                </div>
              <!--  <div style="float:left;display: inline-block;padding-left: 1vw">
                    <a class="navbar-brand visible-sm  visible-xs" href="#" style="height: 92px;">
                       <img src="fcritlogo.png" style="width: 70px;height:70px;float: left; ">
                    </a>
                </div>
                
                <div class="title2 visible-xs" style="float: left; display:inline-block; padding-left: 2px; " >
                    F.C.R.I.T
                </div>
                <div class="title visible-sm" style="float: left; display:inline-block;padding-left: 1vw; font-size: 25px;" >
                    FR. C. RODRIGUES INSTITUTE oF TECHNOLOGY
                </div>-->
                
            </div>
        </div>
    </div>

 </br></br>
 <div style="border: 0.5vw solid #9bba6e;opacity: 1; margin-left: 29vw; margin-right: 29vw;margin-top: 2vw; background-color: #F9F9F9;">
<div style="background-color: #9bba6e; opacity: 1; color: white">
<div style="font-size:30px; margin-left:44%; font-family: 'Dosis', sans-serif;">LOGIN</div></div>
<form name="login_form" method="post" action="loginauthenticate.php" > 
</br></br>
<center> 
<input type="text" name="rollnumber" maxlength=6 placeholder="Roll No.">
</br><p id="error" class="error1"></p></br>
<input type="password" name="password" placeholder="Password"><span id="pass"></span></br></center>
<p id="demo" class="error1"></p>
<a href="GenPass.php" style="font-size: 17px;  font-family: 'Dosis', sans-serif;float:right;" >New User? Generate Password.</a></br></br>
<a href="ForgetPass.php" style="font-size: 17px; font-family: 'Dosis', sans-serif; float: right;" >Forgot Password?</a>
</br></br>
<center><input type="submit" value="Login" onclick="val()" style="font-family: 'Dosis', sans-serif;float: center;"></center> 
</form>

</div>
</br></br></br>
<div class="footer">
             <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; F.C.R.I.T.</p>
                </div>
            </div>
        </footer>
       </div>

</div>  
</body>
</html>

