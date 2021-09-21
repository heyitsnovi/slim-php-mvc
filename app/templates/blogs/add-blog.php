<!DOCTYPE html>
<html>
<head>
	<title>Add New Artist</title>
</head>
<body>

	<form method="POST" action="<?= APP_URL.'blogs/save-blog' ?>" >
		<label>Artist Name</label>
		<input type="text" name="artist_name"/ required="">
		<br>
		<label>Artist Age</label>
		<input type="number" name="artist_age" required=""/>
		<br>
		 <label>Artist Gender</label>
		<select name="artist_gender" required="">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		<br>
		<label>Artist Photo URL</label>
		<input type="url" name="artist_photo" required=""/>
		<br>
		<button type="submit">Save</button>
	</form>
	
</body>
</html>