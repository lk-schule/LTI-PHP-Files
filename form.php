<?php


$user = "root";
 $pass = "";
 $db = "kreativlabor";
 $host = "localhost";

 $conn = mysqli_connect($host, $user, $pass, $db);
 if (!$conn){
	die("Verbindung gescheitert " . mysqli_error());
 }
 if( isset( $_POST['b1'])){
	echo "Du hast auf Absenden gedr&uuml;ckt <br><h1>Dein Text: <br>" . $_POST['text1'] . "</h1> <br>  " ;
 }
	$sql = "select Nachname, Vorname, Adresse ,PLZ from tab_person";

	$result = mysqli_query($conn, $sql);

	if(!$result){
		echo "Fehler beim Ausf&uuml;hren des Queries: " . mysqli_error($conn);
	}
	else{
	
	if ($value = mysqli_fetch_assoc($result)){
	
?>






<html>
<head>
<title>Formular 1</title>
</head>
<body>
<form method="post" action="form.php">
<input type="text" id="text1" name="text1" value="<?php echo $value["Nachname"] ?>"><br>
<input type="text" id="text2" name="text2" value="<?php echo $value["Vorname"] ?>"><br>
<input type="text" id="text3" name="text3" value="<?php echo $value["Adresse"] ?>"><br>
<input type="text" id="text4" name="text4" value="<?php echo $value["PLZ"] ?>"><br>
<button type="submit" id="b1" name="b1">L&ouml;schen</button>
<button type="submit" id="b2" name="b2">&Auml;ndern</button> <br>

</form>
</body>
</html>
<?php }} ?>