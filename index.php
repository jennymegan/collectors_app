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
    <?php
    $db = new PDO('mysql:host=db;dbname=collection_app', 'root','password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query=$db->prepare('SELECT `cover_art`, `artist_firstname`, `artist_lastname`, `album`, `year`, `cover_art` FROM `my_vinyl_collection` ');
    $query->execute();
    $vinylDetails=$query->fetchAll();

      foreach($vinylDetails as $Details) {
          $coverArt = $Details['cover_art'];
          $artistFirstName = $Details['artist_firstname'];
          $artistLastName = $Details['artist_lastname'];
          $album = $Details['album'];
          $year = $Details['year'];
          ?>
          <div class="collection_item">
              <div>
                  <img src="<?php echo $coverArt?>" alt="Cover Art [If Available]">
              </div>
              <div>
                  <h4>Artist Name: <?php echo $artistFirstName . " " . $artistLastName?></h4>
                  <h4>Album Name: <?php echo $album ?></h4>
                  <h4>Year Released: <?php echo $year ?></h4>
              </div>
          </div>
    <?php
    } ?>
    </body>
</html>

