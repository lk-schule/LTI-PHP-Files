<html>
<head>
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

  <!-- use the font -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
	  margin-left: 25%;
}
  </style>
<style>
	i {
    font-style: normal;
	color: red;
}
</style>
</head>
<?php

$schuelerArray = array(1 => "Markus Dec", 2 => "Jonas Enxing", 3 => "Luca Hartmann", 4 => "Luca Hülsmann", 5 => "Luca Kiebel", 6 => "Lucas Oelgemöller", 7 => "Pia Stax", 8 => "Maike Storb", 9 => "Markus Sulzer", 10 => "Felix Sträter", 11 => "Julian Uphoff", 12 => "Robin Zehrer");

$random = rand(1, 12);

if($random == 7 || $random == 8)
	echo "<h1>Die Schülerin ";
else
	echo "<h1>Der Schüler ";
echo "<i>" .$schuelerArray[$random]. "</i> wurde ausgewählt </h1>";
?>
</html>