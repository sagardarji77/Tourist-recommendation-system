<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<style>
.error{color:purple;}
.login{padding-left:700px;
       color:purple;}
.login a{color:purple;
       }
.login a:hover{color:white;
       }
h4{color:white;}	   
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr = "";
$name = $email = $password = $cpassword = "";
$f1=$f2=$f3=$f4=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
	  $f1=1;
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
	  $f2=1;
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
       $f2=0;	  
    }
	
  }
    
$p=$_POST["password"];
  if (strlen($p)>8||strlen($p)<4) {
    $passwordErr = "invalid password";
  } else {
	  $f3=1;
    $password = test_input($_POST["password"]);
  }
  $p1=$_POST["cpassword"];
  if (strcmp($p,$p1)) {
    $cpasswordErr	= "invalid confirmation";
  } else {
	  $f4=1;
    $cpassword = test_input($_POST["cpassword"]);
  }
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($f1==1 && $f2==1 && $f3==1 && $f4==1)
{
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->user->data;

$result = $collection->insertOne( [ 'name' => $name, 'email' => $email,'password' => $cpassword ] );
session_start();
$_SESSION['name'] = $name;
echo"document inserted";
header('Location:index.php');
}

?>

	<div class="contact_form_section">
		<div class="container">
		
			<div class="row">
				<div class="col">
<div class="contact_form_container">
<div class="logo"><a href="#"><img src="images/logo.png" alt="">travelix</a></div><span><div id="contact_form_name" class="login"><h4>Tourist Recommendation Application which will guid you about your tour</h4></div></span>
<p><span class="error"></span></p>
<form method="post" id="contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <input type="text" id="contact_form_name" class="contact_form_name input_field" name="name" placeholder="Name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <input type="text" id="contact_form_name" class="contact_form_name input_field" name="email" placeholder="E-mail" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="text" id="contact_form_name" class="contact_form_name input_field" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword;?>">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br>
  <button type="submit" id="form_submit_button" class="form_submit_button button trans_200">Sign Up<span></span><span></span><span></span></button>
  <div class="login"><a href="login.php"><h3>Go to login page</h3></a></div>
  </form>
</div>
</div>
</div>
</div>
</div></br>
<span></span>

</body>
</html>