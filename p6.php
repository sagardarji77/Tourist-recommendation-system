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
<h1>walt disney world</h1>
<img src="images/pr6.jpg" alt="">
</div>
<div id="about" >
<h2>About:</h2>
<p>The Walt Disney World Resort, commonly known as Walt Disney World or often just as Disney World, is an entertainment complex in Bay Lake and Lake Buena Vista, Florida, the United States., near Orlando and Kissimmee. Opened on October 1, 1971, the resort is owned and operated by Walt Disney Parks, Experiences and Consumer Products, a division of The Walt Disney Company. It was initially operated by Walt Disney World Company. The property covers nearly 25,000 acres (39 sq mi; 101 km2),[2] featuring four theme parks, two water parks, twenty-seven themed resort hotels, nine non-Disney hotels, several golf courses, a camping resort, and other entertainment venues, including the outdoor shopping center Disney Springs.</p>

<p>Designed to supplement Disneyland in Anaheim, California, which had opened in 1955, the complex was developed by Walt Disney in the 1960s. "The Florida Project", as it was known, was intended to present a distinct vision with its own diverse set of attractions. Walt Disney's original plans also called for the inclusion of an "Experimental Prototype Community of Tomorrow" (EPCOT), a planned community intended to serve as a test bed for new city living innovations. After extensive lobbying, the government of Florida created the Reedy Creek Improvement District, a special government district that essentially gave The Walt Disney Company the standard powers and autonomy of an incorporated city. Walt Disney died on December 15, 1966, during construction of the complex. Without Disney spearheading the construction, the company created a resort similar to Disneyland, abandoning experimental concepts for a planned community. Magic Kingdom was the first theme park to open in the complex, in 1971, followed by Epcot in 1982, Disney's Hollywood Studios in 1989, and the most recent, Disney's Animal Kingdom in 1998.</p>

<p>Today, Walt Disney World is the most visited vacation resort in the world, with an average annual attendance of over 52 million.[3] The resort is the flagship destination of Disney's worldwide corporate enterprise, and has become a popular staple in American culture.</p>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img31.jpg">
<img class="images" src="images/img32.jpg">
<img class="images" src="images/img33.jpg">
<img class="images" src="images/img34.jpg">
<img class="images" src="images/img35.jpg">
<img class="images" src="images/img36.jpg">
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
$collection = $client->user->review6;
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