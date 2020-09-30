<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Vinyl Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="stylesheet.css" type="text/css" rel="stylesheet">
</head>
<!-- REMEMBER TO PUT THE STYLESHEET BACK-->
<body>
<div class="title_bar">
    <div class="logo"><img src="logo1.png" alt="Jenny Logo"></div>
    <h1>MY VINYL COLLECTION</h1>
</div>
<div class="container">
    <form action="newEntryHandling.php" enctype='multipart/form-data' method="POST">
        <ul class=""form_wrapper">
        <li class="form_row"><label>Artist First Name*: </label><input type="text" name="artist_firstname"></li>
        <li class="form_row"><label>Artist Last Name: </label><input type="text" name="artist_lastname"></li>
        <li class="form_row"><label>Album*: </label><input type="text" name="album"></li>
        <li class="form_row"><label>Release Year (YYYY)*: </label><input type="text" name="year" maxlength="4"></li>
        <li class="form_row"><label>Album Art: </label><input type="file" name="cover_art" value="Upload"></li>
        <li class="form_row"><input class="add_vinyl_button" type = "submit" name="upload" value="Add My Vinyl!"></li>
        </ul>
    </form>
    <a href="index.php"><h4>Back to Collection<h4></h4></a>
</div>

</body>
<footer>
    <h6>Copyright J A-T 2020 &copy;</h6>
</footer>
</html>
