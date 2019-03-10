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
<h1>Niagara Falls</h1>
<img src="images/pr4.jpg" alt="orlando">
</div>
<div id="about" >
<h2>About:</h2>
<p>Niagara Falls is the collective name for three waterfalls that straddle the international border between the Canadian province of Ontario and the American state of New York. They form the southern end of the Niagara Gorge.</p>

<p>From largest to smallest, the three waterfalls are the Horseshoe Falls, the American Falls and the Bridal Veil Falls. The Horseshoe Falls lies on the border of the United States and Canada with the American Falls entirely on the United States' side, separated by Goat Island. The smaller Bridal Veil Falls are also on the United States' side, separated from the American Falls by Luna Island.</p>

<p>Located on the Niagara River, which drains Lake Erie into Lake Ontario, the combined falls form the highest flow rate of any waterfall in North America that has a vertical drop of more than 165 feet (50 m). During peak daytime tourist hours, more than six million cubic feet (168,000 m3) of water goes over the crest of the falls every minute. Horseshoe Falls is the most powerful waterfall in North America, as measured by flow rate.</p>
</div>

<div id="images">
<h2>Images</h2>
<img class="images" src="images/img19.jpg">
<img class="images" src="images/img20.jpg">
<img class="images" src="images/img21.jpg">
<img class="images" src="images/img22.jpg">
<img class="images" src="images/img23.jpg">
<img class="images" src="images/img24.jpg">
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
$collection = $client->user->review4;
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