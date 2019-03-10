<style>
.link {
    background-color:purple;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	text-transform: capitalize;
}
.link:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>
<?php
session_start();
$result1="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$country = ($_POST['country']);
$category = ($_POST['category']);
$activity = ($_POST['activity']);
$tourtype = ($_POST['tourtype']);
$error = array();
// Email Validation

require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->user->place;

$qry = array('$or' => array(
  array("country" => "$country"),
  array("category" => "$category"),
  array("activity" => "$activity"),
  array("tourtype" => "$tourtype")
));
$result = $collection->find($qry);

if($result){
foreach ($result as $document) {
      $result1=$document["url"];
	  $result2=$document["name"];
	 echo "<a href='$result1'><div class='link'>$result2</div></a></br>";
}
//header('Location: '.$result1);
}
else{
echo "place is not in the database";
}  
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

