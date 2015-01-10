<?php
$couch_dsn = "http://addressbook-pwmvx1289.rhcloud.com/";
$couch_db = "profiles";

require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";


$client = new couchClient($couch_dsn,$couch_db);
?>