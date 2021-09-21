<!DOCTYPE html>
<html>
<head>
	<title>Viewing Blog </title>
</head>
<body>
	<h1>Artist Info</h1>
	<img style="width:150px; height:150px;" src="<?php echo strip_tags($artist_details['photo']);?>">
	<p>Name: <?php echo strip_tags($artist_details['name']);?></p>
	<p>Age: <?php echo strip_tags($artist_details['age']);?></p>
	<p><?php echo strip_tags($artist_details['gender']);?></p>

	<a href="/blogs">Back to Artists</a>

</body>
</html>