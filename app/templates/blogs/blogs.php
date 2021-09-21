<!DOCTYPE html>
<html>
<head>
	<title>Artists Blogs</title>
</head>
<body>
	<?php foreach($artists as $artist):?>
		<li><a href="<?= '/blogs/view/'.$artist['id']?>"><?= $artist['name'] ?></a></li>
	<?php endforeach;?>
</body>
</html>