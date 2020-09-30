<?php
/**
 * Connects to a named database
 *
 * @param $dbName database The name of the database to connect to
 *
 * @return PDO The connection between database & server ready to have information extracted
 *
 */

function getDatabase(database $dbName): PDO {
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
    foreach ($vinylDetails as $vinyl) {
        if (
            isset($vinyl['artist_firstname']) &&
            isset($vinyl['album']) &&
            isset($vinyl['year'])
            ) {

            $vinyl['cover_art'] = $vinyl['cover_art'] ?? 'no_img.jpg';
            $vinyl['artist_lastname'] = $vinyl['artist_lastname'] ?? '';

            $result .= ' 
                 <div class="collection_item">
                  <div>
                     <img src="' . $vinyl['cover_art']. '" alt="Cover Art [If Available]">
                  </div>
                  <div class="info_text">
                      <h4>Artist Name: ' . $vinyl['artist_firstname'] . ' ' . $vinyl['artist_lastname'] . '</h4>
                      <h4>Album Name: ' . $vinyl['album'] . '</h4>
                      <h4>Year Released: ' . $vinyl['year']. '</h4>
                    </div>
                   </div>';
        }
    }
    return $result;
}


