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
         <div class="logo"><img src="logo1.png" alt="Jenny Logo"></div>
    <h1>MY VINYL COLLECTION</h1>
         <a href="newEntry.php"><h4>Add Vinyl</h4></a>
     </div>
     <div class="container">
    <?php
    include ('functions.php');
    $db = getDatabase('collection_app');

    $query = $db->prepare('SELECT `artist_firstname`, `artist_lastname`, `album`, `year`, `cover_art`, `id`, `deleted` FROM `my_vinyl_collection`; ');
    $query->execute();
    $vinylDetails = $query->fetchAll();
    echo populateTable($vinylDetails);
    ?>
     </div>
    </body>
        <footer>
            <h6>Copyright J A-T 2020 &copy;</h6>
        </footer>
</html>

