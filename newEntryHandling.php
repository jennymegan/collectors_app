<?php
include ('functions.php');

$db = getDatabase('collection_app');

//if(isset($_POST['upload'])){

if(isset($_POST['cover_art'])){
    $name = $_FILES['cover_art']['name'];

//    Note not sure on how to write target directory when it is local

    $target_dir = "/Users/jennifertwist/server/html/collectors_app/";
    $target_file = $target_dir . basename($_FILES['cover_art']['name']);

    // Check file type is ok
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");

    if( in_array($imageFileType,$extensions_arr) ){
        move_uploaded_file($_FILES['cover_art']['tmp_name'],$target_dir.$name);
        $query=$db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`, `cover_art`) VALUES (:firstname, :album, :year, :lastname, :art); ');
        $query->execute(['firstname'=>$_POST['artist_firstname'], 'album' => $_POST['album'], 'year' => $_POST['year'],'lastname' =>$_POST['artist_lastname'], 'art' => $name]);

    } else {

        // error because wrong filetype
    }

} else {


$query=$db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`) VALUES (:firstname, :album, :year, :lastname); ');
$query->execute(['firstname'=>$_POST['artist_firstname'], 'album' => $_POST['album'], 'year' => $_POST['year'],'lastname' =>$_POST['artist_lastname']]);

}

header('Location: index.php');