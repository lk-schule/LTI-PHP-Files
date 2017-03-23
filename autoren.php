<?php
 $user = "root";
 $pass = "";
 $db = "buch";
 $host = "localhost";

 $conn = mysqli_connect($host, $user, $pass, $db);
 if (!$conn){
	die("Verbindung gescheitert " . mysqli_error());
 }
	$sql = "select VName, NName, GDatum, SDatum from tab_autor";

	$result = mysqli_query($conn, $sql);

	if(!$result){
		echo "Fehler beim Ausf�hren des Queries: " . mysqli_error($conn);
	}
	else{




	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Autoren</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nr</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Geburtsdatum</th>
        <th>Sterbedatum</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $num = 1;
      while (	$array = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$num."</td>";
        echo "<td>".$array["VName"]."</td>";
        echo "<td>".$array["NName"]."</td>";
        echo "<td>".$array["GDatum"]."</td>";
        echo "<td>".$array["SDatum"]."</td>";
        echo "</tr>";
        $num++;
      }
       ?>
    </tbody>
  </table>
  <p><?php      echo "Es wurden ".$result->num_rows." Datens&auml;tze aus der Datenbank geholt, falls man das nicht sieht!";
?></p>
</div>

</body>
</html>
