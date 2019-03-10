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
       }
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
$succss =$email=$password=$error="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = ($_POST['email']);
$password = ($_POST['password']);
// Email Validation
if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
{
$error = "Empty or invalid email address";
}
if(empty($password)){
$error = "Enter your password"; 
}
if(!$error){
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->user->data;
$qry = array("email" => $email,"password" => $password);
$result = $collection->findOne($qry);
$name=$result["name"];
session_start();
$_SESSION['name'] = $name;
if($result){
header('Location:index.html');
}
else{
$error = "enter valid email and password";
} 
}
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
 
  <input type="text" id="contact_form_name" class="contact_form_name input_field"  placeholder="E-mail"name="email" value="<?php echo $email;?>">
  <br><br>
  <input type="password" id="contact_form_name" class="contact_form_name input_field" placeholder="Password "name="password" value="<?php echo $password;?>"></br>
  <button type="submit" id="form_submit_button" class="form_submit_button button trans_200">login<span></span><span></span><span></span></button>
  <div class="login"><a href="signup.php"><h3>Go to sign up page</h3></a></div>
  <?php echo "<h4>$error</h4>" ?>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>