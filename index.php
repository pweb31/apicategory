<?php
include 'database.php';
$categories = [];

$sql = "SELECT * FROM categorie";
if($result = $db->query($sql))
{
	$i = 0;
	while($row = $result->fetch_assoc())
	{
		$categories[$i]['id'] = $row['id'];
		$categories[$i]['nom'] = $row['nom'];
		$i++;
	}
	echo json_encode($categories);
}
else
{
	http_response_code(404);
}