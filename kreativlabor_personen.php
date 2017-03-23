<?php
 $user = "root";
 $pass = "";
 $db = "kreativlabor";
 $host = "localhost";

 $conn = mysqli_connect($host, $user, $pass, $db);
 if (!$conn){
	die("Verbindung gescheitert " . mysqli_error());
 }
	$sql = "select PersonNr, Vorname, Nachname, plz, Adresse, Ort from tab_person natural left join tab_ort";

	$result = mysqli_query($conn, $sql);

	if(!$result){
		echo "Fehler beim Ausf&uuml;hren des Queries: " . mysqli_error($conn);
	}
	else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/e/e4/Water_ice_clouds_hanging_above_Tharsis_PIA02653_black_background.jpg">
  <title>Kreativ Labor - Personen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  i {
    font-style: normal;
	color: red;
}
  </style>
</head>
<body>

<div class="container">
  <h2>Personen</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nr</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Adresse</th>
        <th>Ort</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $num = 1;
      while (	$array = mysqli_fetch_assoc($result)){
        ?>
		<tr>
		<td><?=$num?></td>
		<td><?=$array["Vorname"]?></td>
		<td><?=$array["Nachname"]?></td>
		<td><?php if(!empty($array["Adresse"])){echo $array["Adresse"];} else echo "<i>Unbekannt</i>"; ?></td>
		<td><?php if(!empty($array["plz"]) &&  !empty($array["Ort"])){echo $array["plz"]." ".$array["Ort"];} else if(empty($array["plz"]) ||  empty($array["Ort"])){echo "<i> Unbekannt </i>";} ?></td>
		</tr>
		<?php
        $num++;
      }
       ?>
    </tbody>
  </table>
  <p><?php echo "Es wurden <i>".$result->num_rows."</i> Datens&auml;tze aus der Datenbank geholt!"; ?></p>
</div>

</body>
</html>
<?php } ?>
