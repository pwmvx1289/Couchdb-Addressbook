<?php
$couch_dsn = "http://addressbook-pwmvx1289.rhcloud.com/";
$couch_db = "profiles";

require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";


$client = new couchClient($couch_dsn,$couch_db);

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
?>

<!doctype html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="shortcut icon" href="{{ url_for('static', filename='favicon.ico') }}">
    <meta charset="UTF-8">
    <title>CouchDB AddressBook</title>
    <meta name="Description" content="AddressBook based on CouchDB" />
    <meta name="author" content="AW" />

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css">
</head>
<style type="text/css">
.input-group{
  margin:10px auto;
}
</style>
<body style="background-color:#F8F8F8">

  <?php
  include 'navmenu.php';
  ?>

<script type="text/javascript">$( "#Add" ).addClass( "active" );</script>

<div style="width:90%; margin:50px auto;">
  <form action="profileaction.php" method="post">
	<div class="input-group">
  	<span class="input-group-addon" id="basic-addon1">Name</span>
  	<input type="text" class="form-control" name="name" placeholder="Full name" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Email</span>
    <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group">
  	<span class="input-group-addon" id="basic-addon1">Hometown</span>
  	<input type="text" class="form-control" name="home" placeholder="Hometown" aria-describedby="basic-addon1">
  </div>

    <div class="input-group">
  	<span class="input-group-addon" id="basic-addon1">Intro</span>
  	<input type="text" class="form-control" name="intro" placeholder="Self Introduction" aria-describedby="basic-addon1">
  </div>

  <div class="input-group">
  	<span class="input-group-addon" id="basic-addon1">Profile picture</span>
  	<input type="text" class="form-control" name="propic" placeholder="Your profile picture's link" aria-describedby="basic-addon1">
	</div>
  <input type="submit">
  </form>

</div>	
</body>
</html>
