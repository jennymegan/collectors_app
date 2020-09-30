<?php
include ('functions.php');

$db = getDatabase('collection_app');
$query=$db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`, `cover_art`) VALUES (:firstname, :album, :year, :lastname); ');
$query->execute(['firstname'=>$_POST['artist_firstname'], 'album' => $_POST['album'], 'year' => $_POST['year'],'lastname' =>$_POST['artist_lastname']]);

//if(isset($_POST['upload'])){

    if(isset($_POST['cover_art'])){
    $name = $_FILES['cover_art']['name'];

//    Note not sure on how to write target directory when it is local

    $target_dir = "";
    $target_file = $target_dir . basename($_FILES['cover_art']['name']);

    // Check file type is ok
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
        $query=$db->prepare('INSERT INTO `my_vinyl_collection` (`cover_art`) VALUES (:art); ');
        $query->execute(['art' => $name]);
        move_uploaded_file($_FILES['cover_art']['tmp_name'],$target_dir.$name);
    }
}
header('Location: index.php');