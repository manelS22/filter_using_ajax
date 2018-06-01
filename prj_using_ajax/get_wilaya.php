<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">alert("it works");</script>
<body>
<?php
require_once("connection.php");
$db_handle = new DBController();


	$query ="SELECT * FROM wilaya WHERE nom_region = '" . $_POST["nom_region"] . "'";

	$results = $dbhandle->query($query);
?>
	<option value="">Selectionnez wilaya</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["nom_wilaya"]; ?>"><?php echo $rs["nom_wilaya"]; ?></option>
<?php

}
?>
</body>
</html>

