<?php
$couch_dsn = "http://localhost:5984/";
$couch_db = "songs";

require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";


$client = new couchClient($couch_dsn,$couch_db);
?>
abc