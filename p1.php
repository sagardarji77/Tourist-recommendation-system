<html>
<head>
<title>Great Wall Of China </title>
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
form{margin-left:20px;}
.card1{ margin-left:20px; margin-right: 1200px;border-radius: 15px;}
.card2{ margin-left:20px; margin-right: 500px;height:100px;border-radius: 25px;margin-bottom: 20px; }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
$name = $_SESSION['name'];
?>
<div id="home">
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="#images">Images</a></li>
  <li><a href="#review">Review</a></li>
  <li><a href="#review">Rating</a></li>
</ul>
<h1>Great Wall Of China</h1>
<img src="images/pr1.jpg" alt="orlando">
</div>
<div id="about" >
<h2>About:</h2>
<p>The Great Wall of China is a series of fortifications made of stone, brick, tamped earth, wood, and other materials, generally built along an east-to-west line across the historical northern borders of China to protect the Chinese states and empires against the raids and invasions of the various nomadic groups of the Eurasian Steppe with an eye to expansion. Several walls were being built as early as the 7th century BC; these, later joined together and made bigger and stronger, are collectively referred to as the Great Wall. Especially famous is the wall built in 220–206 BC by Qin Shi Huang, the first Emperor of China. Little of that wall remains. The Great Wall has been rebuilt, maintained, and enhanced over various dynasties; the majority of the existing wall is from the Ming Dynasty (1368–1644).</p>

<p>Apart from defense, other purposes of the Great Wall have included border controls, allowing the imposition of duties on goods transported along the Silk Road, regulation or encouragement of trade and the control of immigration and emigration. Furthermore, the defensive characteristics of the Great Wall were enhanced by the construction of watch towers, troop barracks, garrison stations, signaling capabilities through the means of smoke or fire, and the fact that the path of the Great Wall also served as a transportation corridor.</p>

<p>The frontier walls built by different dynasties have multiple courses. Collectively, they stretch from Dandong in the east to Lop Lake in the west, from present-day Sino-Russian border in the north to Qinghai in the south; along an arc that roughly delineates the edge of Mongolian steppe. A comprehensive archaeological survey, using advanced technologies, has concluded that the walls built by the Ming dynasty measure 8,850 km (5,500 mi).[4] This is made up of 6,259 km (3,889 mi) sections of actual wall, 359 km (223 mi) of trenches and 2,232 km (1,387 mi) of natural defensive barriers such as hills and rivers. Another archaeological survey found that the entire wall with all of its branches measures out to be 21,196 km (13,171 mi). Today, the Great Wall is generally recognized as one of the most impressive architectural feats in history.</p>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img1.jpg">
<img class="images" src="images/img2.jpg">
<img class="images" src="images/img3.jpg">
<img class="images" src="images/img4.jpg">
<img class="images" src="images/img5.jpg">
<img class="images" src="images/img6.jpg">
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
$collection = $client->user->review1;
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
<div>

</div>

</body>
</html>