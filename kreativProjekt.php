<?php
$user = "root";
 $pass = "";
 $db = "kreativlabor";
 $host = "localhost";

 $conn = mysqli_connect($host, $user, $pass, $db);
 if (!$conn){
	die("Verbindung gescheitert " . mysqli_error());
 }
	
		$sql = "select * from tab_projekt";

		$result = mysqli_query($conn, $sql);
	if(!$result){
		echo "Fehler beim Ausf&uuml;hren des Queries: " . mysqli_error($conn);
	}
	else{
?>

<!DOCTYPE html>
<html lang="DE">
<head>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/e/e4/Water_ice_clouds_hanging_above_Tharsis_PIA02653_black_background.jpg">
  <title>Kreativ Labor - Personen</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <style>
  i {
	font-style: normal;
	color: red;
}
text.b {
	font-weight: bold;
}
  </style>
</head>
<body class="body">

<div class="container">
  <h2>Kreativlabor</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Projekt</th>
        <th>Teilnehmer</th>
      </tr>
    </thead>
    <tbody>
     <?php while ( $row1 = mysqli_fetch_assoc($result)){ ?>
		<tr>
		<td><text class="b"><?php echo $row1["Titel"] ?></text> <br> Etat: <?php echo $row1["Etat"] ?>€ </td><td><ul>
		<?php 
		$sql = "select ProjektNR, vorname, nachname, adresse, plz, ort from tab_projekt natural join ztab_projekt_person natural join tab_person natural left join tab_ort where projektnr =". (int) $row1["projektNr"];

		$result2 = mysqli_query($conn, $sql);
		while ( $row2 = mysqli_fetch_assoc($result2) ) { ?>
			<li><?php echo $row2["vorname"]." ".$row2["nachname"]; if(!empty($row2["adresse"])){ echo ", ".$row2["adresse"].", ".$row2["plz"]." ".$row2["ort"];} else{ ?> <i> <?php echo "&lt;/Adresse Unbekannt&gt;" ;}?></i></li>
		<?php }?>
		</ul></td></tr>	<?php } ?>
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>