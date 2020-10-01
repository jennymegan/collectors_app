<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Vinyl Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="stylesheet.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="title_bar">
    <div class="logo">
        <img src="logo1.png" alt="Jenny Logo">
    </div>
    <h1>MY VINYL COLLECTION</h1>
    <div></div>
</div>
<div class="container">
    <form action="newEntryHandling.php" enctype='multipart/form-data' method="POST">
        <ul class=""form_wrapper">
        <li class="form_row">
            <label>Artist First Name*: </label>
            <input type="text" name="artist_firstname" required>
        </li>
        <li class="form_row">
            <label>Artist Last Name: </label>
            <input type="text" name="artist_lastname">
        </li>
        <li class="form_row">
            <label>Album*: </label>
            <input type="text" name="album" required>
        </li>
        <li class="form_row">
            <label>Release Year (YYYY)*: </label>
            <input type="text" name="year" maxlength="4" required></li>
        <li class="form_row">
            <label>Album Art: </label>
            <label class="file_upload">
                <input class="file_upload" type="file" name="cover_art">
            </label>
        </li>
        <li class="form_row">
            <input class="add_vinyl_button" type="submit" value="Add My Vinyl!">
        </li>
        </ul>
    </form>
    <div class="error">
        <h4><?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<br><br><h2>You attempted to upload the incorrect filetype. Please try again. </h2><br><br>';
        } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<br><br><h2>An error occurred. Please try again.</h2><br><br>';
        } elseif (isset($_GET['error']) && $_GET['error'] == 3) {
            echo '<br><br><h2>An error occurred querying the database. Please try again.</h2><br><br>';
        } ?>
        </h4>
    </div>
    <a class="back_collection" href="index.php"><h4>Back to Collection</h4></a>
</div>

</body>
<footer>
    <h6>Copyright J A-T 2020 &copy;</h6>
</footer>
</html>
