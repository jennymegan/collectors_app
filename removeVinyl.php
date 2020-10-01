<?php

include ('functions.php');

$db = getDatabase('collection_app');

function deleteVinyl(PDO $db) {
    if (isset($_POST['delete']) ) {
        $query = $db->prepare('UPDATE `my_vinyl_collection` SET `deleted` = 1 WHERE `id` = ?');
        $query->execute([$_POST['vinyl_id']]);
        header('Location: index.php');
    }
}

deleteVinyl($db);