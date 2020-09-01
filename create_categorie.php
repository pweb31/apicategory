<?php
include 'database.php';
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
	$request = json_decode($postdata,true);
	// Validate.
	if(trim($request['nom']) === '' )
	{
		return http_response_code(400);
	}
	$nom = mysqli_real_escape_string($db, trim($request['nom']));
	$sql = "INSERT INTO categorie (id,nom) VALUES (null,'$nom')";
	if($db->query($sql))
	{
		http_response_code(201);
		$categorie = [
		'id' => mysqli_insert_id($db),
		'nom' => $nom
		];
		echo json_encode($categorie);
	}
	else
	{
		http_response_code(422);
	}
}