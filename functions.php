<?php
/**
 * Connects to a named database
 *
 * @param $dbName string The name of the database to connect to
 *
 * @return PDO The connection between database & server ready to have information extracted
 *
 */

function getDatabase(string $dbName): PDO {
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
        if ($vinyl['deleted']) {
            continue;
        }
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
                      <div>
                          <form class="delete_form" action="removeVinyl.php" method="POST">
                            <input type="hidden" name="vinyl_id" value="' . $vinyl['id'] .'">
                            <input type="submit" class="delete_button" name="delete" value="Remove">
                          </form>
                      </div>
                    </div>
                   </div>';
        }
    }
    return $result;
}

/**
 * Adds the array of POST data to the database
 *
 * @param array $vinylArray array of info collected from form
 *
 * @param PDO $db database to connect to
 *
 */
function addNewVinylNoArt(array $vinylArray,PDO $db){

    if (
        !empty($vinylArray['artist_firstname']) &&
        !empty($vinylArray['album']) &&
        !empty($vinylArray['year'])
    ) {
        $vinylArray['artist_lastname'] = $vinylArray['artist_lastname'] ?? '';
        $query = $db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`) VALUES (:artist_firstname, :album, :year, :artist_lastname); ');
        if ($query->execute($vinylArray) ) {
            header('Location: index.php');
        } else {
            header('Location: newEntry.php?error=3');
        }
    } else {
        header('Location: newEntry.php?error=2');
    }
}



/**
 * Adds the array of POST data to the database and also an image file (if meets certain filetype)
 *
 * @param array $vinylArray array of info collected from form
 *
 * @param array $file the file array collected from form
 *
 * @param PDO $db database to connect to
 *
 */
function addNewVinylWithArt(array $vinylArray, array $file,PDO $db)
{
    if (
        !empty($vinylArray['artist_firstname']) &&
        !empty($vinylArray['album']) &&
        !empty($vinylArray['year'])
    ) {
        if (!empty($file['cover_art']['name'])) {
            $name = $file['cover_art']['name'];
            $target_dir = dirname(__FILE__);
            $target_file = $target_dir . '/' . basename($file['cover_art']['name']);

            // Check file type is ok
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_arr = ["jpg", "jpeg", "png", "gif"];

            if (in_array($imageFileType, $extensions_arr)) {
                move_uploaded_file($file['cover_art']['tmp_name'], $target_file);

                //Upload data with cover image
                $vinylArray['artist_lastname'] = $vinylArray['artist_lastname'] ?? '';
                $vinylArray['cover_art'] = $name;
                $query = $db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`, `cover_art`) VALUES (:artist_firstname, :album, :year, :artist_lastname, :cover_art); ');
                if ($query->execute($vinylArray) ) {
                    header('Location: index.php');
                } else {
                    header('Location: newEntry.php?error=3');
                }
            } else {
                header('Location: newEntry.php?error=1');
            }
        }
    }
}

/**
 * "Removes" an item ftom display (by changing its deleted index in db to 1)
 *
 * @param PDO $db the database to connect to
 *
 */
function deleteVinyl(PDO $db) {
    if (isset($_POST['delete']) ) {
        $query = $db->prepare('UPDATE `my_vinyl_collection` SET `deleted` = 1 WHERE `id` = ?');
        $query->execute([$_POST['vinyl_id']]);
        header('Location: index.php');
    }
}