<html>
<head>
<title></title>
<style>
h1 {text-align:center;
    color:rgb(154, 27, 78);
    color:	}
img { width:100%; 
      height:auto;}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width="100%;
    background-color:#f1f1f1;
	position:fixed;
}

li {
    float: left;
}

li a {
    display: block;
	background-color: #f1f1f1;
    color:black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color:#ccc;

}
#about {
    margin:0;
	background-color:Lightgrey;
	color:SlateBlue;
	bottom:20px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

.images {
            border: 1px solid #ccc;
            margin:5px;
            float:left;
            width:48%;
			height:50%;}

			
</style>
</head>
<body>
<div id="home">
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="#images">Images</a></li>
  <li><a href="#review">Rating</a></li>
</ul>
<h1>Blue Lagoon</h1>
<img src="images/pr3.jpg" alt="blue lagoon">
</div>
<div id="about" >
<h2>About:</h2>
<p>The Blue Lagoon (Icelandic: Bláa lónið) is a geothermal spa in southwestern Iceland. The spa is located in a lava field near Grindavík on the Reykjanes Peninsula, in a location favourable for geothermal power, and is supplied by water used in the nearby Svartsengi geothermal power station. The Blue Lagoon is approximately 20 km (12 mi) from Keflavík International Airport, and is one of the most visited attractions in Iceland.</p>
<p>The lagoon is a man-made lagoon which is fed by the water output of the nearby geothermal power plant Svartsengi and is renewed every two days. It is the largest in the world. Superheated water is vented from the ground near a lava flow and used to run turbines that generate electricity. After going through the turbines, the steam and hot water passes through a heat exchanger to provide heat for a municipal water heating system. Then the water is fed into the lagoon for recreational and medicinal users to bathe in.</p>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img13.jpg">
<img class="images" src="images/img14.jpg">
<img class="images" src="images/img15.jpg">
<img class="images" src="images/img16.jpg">
<img class="images" src="images/img17.jpg">
<img class="images" src="images/img18.jpg">
</div>
<div id="review" class="rev2">
<h2>Reviews</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<textarea name="rev" rows="4" cols="50" name="rev" placeholder="write your review about this place.."></textarea><input type="submit" value="submit/view"></input>
</form>
</div>
<?php
$result2 = $result3=$rev ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$rev=$_POST["rev"];
	require 'vendor/autoload.php'; // include Composer's autoloader
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->user->review3;
if($rev!="")
{
$collection->insertOne( [ 'name' => $name,'rev1' => $rev ] );
}

$result1 = $collection->find();
if($result1){
foreach ($result1 as $document) {
	  $name=$document["name"];
	  $result2=$document["rev1"];
	 echo "<div class='card card1 bg-dark text-white'>
    <div class='card-body'>$name</div>
  </div>
  <div class='card card2 bg-secondary text-white'>
    <div class='card-body'>$result2</div>
  </div>";
}
}
}
?>

</body>
</html>