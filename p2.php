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
<h1>PETRA</h1>
<img src="images/pr2.jpg" alt="petra">
</div>
<div id="about" >
<h2>About:</h2>
<p>Petra originally known to its inhabitants as Raqmu, is a historical and archaeological city in southern Jordan. Petra lies on the slope of Jabal Al-Madbah in a basin among the mountains which form the eastern flank of Arabah valley that run from the Dead Sea to the Gulf of Aqaba. Petra is believed to have been settled as early as 9,000 BC, and it was possibly established in the 4th century BC as the capital city of the Nabataean Kingdom. The Nabataeans were nomadic Arabs who invested in Petra's proximity to the trade routes by establishing it as a major regional trading hub.</br>

<p>The trading business gained the Nabataeans considerable revenue and Petra became the focus of their wealth. The earliest historical reference to Petra was the attack to the city ordered by Antigonus I in 312 BC recorded by various Greek historians. The Nabataeans were, unlike their enemies, accustomed to living in the barren deserts, and were able to repel attacks by utilizing the area's mountainous terrain. They were particularly skillful in harvesting rainwater, agriculture and stone carving. Petra flourished in the 1st century AD when its famous Khazneh structure –believed to be the mausoleum of Nabataean King Aretas IV– was constructed, and its population peaked at an estimated 20,000 inhabitants.</br>

<p>Although the Nabataean Kingdom became a client state for the Roman Empire in the first century BC, it was only in 106 AD that they lost their independence. Petra fell to the Romans who annexed and renamed Nabataea to Arabia Petraea. Petra's importance declined as sea trade routes emerged, and after a 363 earthquake destroyed many structures. The Byzantine Era witnessed the construction of several Christian churches, but the city continued to decline, and by the early Islamic era became an abandoned place where only a handful of nomads lived. It remained unknown to the world until it was rediscovered in 1812 by Johann Ludwig Burckhardt.</br>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img7.jpg">
<img class="images" src="images/img8.jpg">
<img class="images" src="images/img9.jpg">
<img class="images" src="images/img10.jpg">
<img class="images" src="images/img11.jpg">
<img class="images" src="images/img12.jpg">
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
$collection = $client->user->review2;
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