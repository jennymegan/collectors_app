<?php

include ('functions.php');

$db = getDatabase('collection_app');

if (empty($_FILES['cover_art']['name'])) {
    addNewVinylNoArt($_POST, $db);
} else {
    addNewVinylWithArt($_POST, $_FILES, $db);
}






