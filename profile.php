<?php
include 'couchini.php';

$id=$_GET["id"];
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
.editbtn{
	position:absolute;
	right:15px;
	display:inline-block;
}
.itemcontent{
	display:inline-block;
}
</style>

<body style="background-color:#F8F8F8">
	<?php
	include 'navmenu.php';
	?>
<div style="width:90%; margin:50px auto;">
  		<?php
  		try {
    		$doc = $client->getDoc($id);
    	} catch ( Exception $e ) {
    		if ( $e->getCode() == 404 ) {
       			echo "Document some_doc_id does not exist !";
        	}
    		exit(1);
			}
		//echo $doc->_id.' revision '.$doc->_rev;
  		?>
  	<div class="row">
  	<div class="col-md-1"></div>
  	<div class="panel panel-default col-md-5">
  	<div class="panel panel-primary" style="margin-top:20px;">
  		<div class="panel-heading">Name</div>
  		<div class="panel-body">
    		<?php
    		echo $doc->name;
    		?>
  		</div>
	</div>
	<div class="panel panel-primary">
  		<div class="panel-heading">Email</div>
  		<div class="panel-body">
    		<?php
    		echo $doc->email;
    		?>
  		</div>
	</div>
	<div class="panel panel-info">
  		<div class="panel-heading">Hometown</div>
  		<div class="panel-body">
    		<?php
    		echo $doc->home;
    		?>
  		</div>
	</div>
	<div class="panel panel-info">
  		<div class="panel-heading">Self introduction</div>
  		<div class="panel-body">
    		<?php
    		echo $doc->intro;
    		?>
  		</div>
	</div>
	</div>
	<div class="col-md-2"></div>
	<?php
	if ($doc->propic=='') $piclink='"http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=1024"';
	else $piclink='"'.$doc->propic.'"';
	?>
	<img src=<?php echo $piclink; ?> alt="Profile picure" class="img-circle col-md-3">
	<div class="col-md-1"></div>
	</div>

</div>	
</body>
</html>
