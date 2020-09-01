<?php
require 'database.php';
$postdata = file_get_contents('php://input');

if(isset($postdata) && !empty($postdata))
{
	$request = json_decode($postdata,true);
	if (trim($request['nom']) == '' ) {
		return http_response_code(400);
	}
	$id = mysqli_real_escape_string($db, (int)$request['id']);
	$nom = mysqli_real_escape_string($db, trim($request['nom']));
	$sql = "UPDATE categorie SET nom='$nom' WHERE id = $id";
	
	if($db->query($sql))
	{
		http_response_code(204);
	}
	else
	{
		return http_response_code(422);
	}
}