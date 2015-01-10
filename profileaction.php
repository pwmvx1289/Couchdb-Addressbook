<?php
include 'couchini.php';

/* Getting database info
try {
	$info = $client->getDatabaseInfos();
} catch (Exception $e) {
	echo "Error:".$e->getMessage()." (errcode=".$e->getCode().")\n";
	exit(1);
}
print_r($info);
*/

/* Getting document
try {
	$doc = $client->getDoc('1');
} catch (Exception $e) {
	if ( $e->code() == 404 ) {
		echo "Document not found\n";
	} else {
		echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
	}
	exit(1);
}
print_r($doc);
*/

$profile = new stdClass();
$profile->name = $_POST["name"];
$profile->email = $_POST["email"];
$profile->home = $_POST["home"];
$profile->intro = $_POST["intro"];
$profile->propic = $_POST["propic"];

$success=0;

try {
	$response = $client->storeDoc($profile);
	$success=1;
} catch (Exception $e) {
	echo "<script type='text/javascript'>alert('Error: ".$e->getMessage()." (errcode=".$e->getCode().")')";
	$success=0;
	exit(1);
}
print_r($response);
header('Location: index.php?success='.$success);
?>