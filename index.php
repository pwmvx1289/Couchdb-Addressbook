<?php
include 'couchini.php';
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

<script type="text/javascript">
/*function viewprofile(id){
	location.href="http://addressbookweb-pwmvx1289.rhcloud.com/profile.php?id="+id;
}*/
</script>

<body style="background-color:#F8F8F8">

	<?php
	include 'navmenu.php';
	?>

<script type="text/javascript">$( "#Home" ).addClass( "active" );</script>

<div style="width:90%; margin:50px auto;">
	<div class="row">
	<div class="col-md-4"></div>
	<ul class="list-group col-md-4">
  		<?php
  		$all_docs = $client->getAllDocs();
		//echo "Database got ".$all_docs->total_rows." documents.<BR>\n";
		foreach ( $all_docs->rows as $row ) {
			try {
   				$doc = $client->getDoc($row->id);
			} catch ( Exception $e ) {
    			if ( $e->getCode() == 404 ) {
       				echo "Document some_doc_id does not exist !";
        		}
    			exit(1);
			}
    		echo '<li class="list-group-item" style="margin:5px auto 5px auto; font-size:15px;"><div class="itemcontent"><a href="http://addressbookweb-pwmvx1289.rhcloud.com/profile.php?id='.$doc->_id.'">'.$doc->name.'</a><br>'.$doc->email.'</div></li>';
		}
  		?>
	</ul>
	<div class="col-md-4"></div>
	</div>

</div>	
</body>
</html>
