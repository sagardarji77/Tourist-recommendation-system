<?php
session_start();
$result1="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = ($_POST['search']);
$error = array();
// Email Validation
if(empty($name) or !filter_var($name,FILTER_SANITIZE_EMAIL))
{
$error[] = "Empty or invalid email address";
}
if(count($error) == 0){
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->user->place;
$qry = array("name" => $name);
$result = $collection->find($qry);

if($result){
foreach ($result as $document) {
      $result1=$document["url"];
}
header('Location: '.$result1);
}
else{
echo "place is not in the database";
} 
} else {
die("Mongo DB not installed");
} 
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
