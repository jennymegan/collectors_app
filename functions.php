<?php
/**
 * Connects to a named database
 *
 * @param $dbName database The name of the database to connect to
 *
 * @return databaseObject The database ready to have information extracted
 *
 */

function getDatabase($dbName) {
    $db = new PDO('mysql:host=db;dbname=' . $dbName, 'root','password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}


/**
 * Takes a given array with expected keys, returns "blocks" of html which use values from the array as variables.
 * The html "blocks" appear as "display cards" with details of specific records.
 * If incorrect key name provided or necessary key not provided, will return an error.
 *
 * @param $vinylDetails array The array being passed in
 *
 * @return string The html "blocks" outputted as a string.
 *
 */
function populateTable(array $vinylDetails): string {
    $result = '';
    foreach ($vinylDetails as $Details) {
        if (isset($Details['artist_firstname']) &&
            isset($Details['album']) &&
            isset($Details['year'])) {

            if ($Details['cover_art'] != NULL) {
                $coverArt = $Details['cover_art'];
            } else {
                $coverArt = 'no_img.jpg';
            }
            $artistFirstName = $Details['artist_firstname'];
            if ($Details['artist_lastname'] != NULL) {
                $artistLastName = $Details['artist_lastname'];
            } else {
                $artistLastName = '';
            }
            $album = $Details['album'];
            $year = $Details['year'];

            $result .= ' 
                 <div class="collection_item">
                  <div>
                     <img src="' . $coverArt . '" alt="Cover Art [If Available]">
                  </div>
                  <div class="info_text">
                      <h4>Artist Name: ' . $artistFirstName . ' ' . $artistLastName . '</h4>
                      <h4>Album Name: ' . $album . '</h4>
                      <h4>Year Released: ' . $year . '</h4>
                    </div>
                   </div>';
        }
    }
    return $result;
}


