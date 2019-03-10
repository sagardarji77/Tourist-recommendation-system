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
<h1>Banff National Park</h1>
<img src="images/pr5.jpg" alt="">
</div>
<div id="about" >
<h2>About:</h2>
<p>Banff National Park is Canada's oldest national park and was established in 1885. Located in the Rocky Mountains, 110–180 kilometres (68–112 mi) west of Calgary in the province of Alberta, Banff encompasses 6,641 square kilometres (2,564 sq mi)[2] of mountainous terrain, with numerous glaciers and ice fields, dense coniferous forest, and alpine landscapes. The Icefields Parkway extends from Lake Louise, connecting to Jasper National Park in the north. Provincial forests and Yoho National Park are neighbours to the west, while Kootenay National Park is located to the south and Kananaskis Country to the southeast. The main commercial centre of the park is the town of Banff, in the Bow River valley.</p>

<p>The Canadian Pacific Railway was instrumental in Banff's early years, building the Banff Springs Hotel and Chateau Lake Louise, and attracting tourists through extensive advertising. In the early 20th century, roads were built in Banff, at times by war internees from World War I, and through Great Depression-era public works projects.[3] Since the 1960s, park accommodations have been open all year, with annual tourism visits to Banff increasing to over 5 million in the 1990s.[4] Millions more pass through the park on the Trans-Canada Highway.[5] As Banff has over three million visitors annually, the health of its ecosystem has been threatened. In the mid-1990s, Parks Canada responded by initiating a two-year study, which resulted in management recommendations, and new policies that aim to preserve ecological integrity.</p>

<p>Banff National Park has a subarctic climate with three ecoregions, including montane, subalpine, and alpine. The forests are dominated by Lodgepole pine at lower elevations and Engelmann spruce in higher ones below the treeline, above which is primarily rocks and ice. Mammal species such as the grizzly, cougar, wolverine, elk, bighorn sheep and moose are found, along with hundreds of bird species. Reptiles and amphibians are also found but only a limited number of species have been recorded. The mountains are formed from sedimentary rocks which were pushed east over newer rock strata, between 80 and 55 million years ago. Over the past few million years, glaciers have at times covered most of the park, but today are found only on the mountain slopes though they include the Columbia Icefield, the largest uninterrupted glacial mass in the Rockies. Erosion from water and ice have carved the mountains into their current shapes.</p>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img25.jpg">
<img class="images" src="images/img26.jpg">
<img class="images" src="images/img27.jpg">
<img class="images" src="images/img28.jpg">
<img class="images" src="images/img29.jpg">
<img class="images" src="images/img30.jpg">
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
$collection = $client->user->review5;
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