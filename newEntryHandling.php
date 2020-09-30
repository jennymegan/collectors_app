<?php
session_start();
include ('functions.php');

$db = getDatabase('collection_app');

if(
    !empty($_POST['artist_firstname']) &&
    !empty($_POST['album']) &&
    !empty($_POST['year'])
    ){
        if(!empty($_FILES['cover_art']['name'])){
            $name = $_FILES['cover_art']['name'];
            $target_dir = dirname(__FILE__); //Gets current filepath (one i'm working in)
            $target_file = $target_dir . '/' . basename($_FILES['cover_art']['name']);

            // Check file type is ok
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = ["jpg","jpeg","png","gif"];

            if(in_array($imageFileType,$extensions_arr) ){
                move_uploaded_file($_FILES['cover_art']['tmp_name'], $target_file);

                //Upload data with cover image
                $query=$db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`, `cover_art`) VALUES (:firstname, :album, :year, :lastname, :art); ');
                $query->execute(['firstname'=>$_POST['artist_firstname'], 'album' => $_POST['album'], 'year' => $_POST['year'],'lastname' =>$_POST['artist_lastname'], 'art' => $name]);
            } else {
                $_SESSION['Error'] = '<br><br><h2>You attempted to upload the incorrect filetype. Please try again. </h2><br><br>';
                header('Location: newEntry.php');
                exit;
            }
} else {
    //upload data with no cover image
    $query=$db->prepare('INSERT INTO `my_vinyl_collection` (`artist_firstname`, `album`, `year`, `artist_lastname`) VALUES (:firstname, :album, :year, :lastname); ');
    $query->execute(['firstname'=>$_POST['artist_firstname'], 'album' => $_POST['album'], 'year' => $_POST['year'],'lastname' =>$_POST['artist_lastname']]);
}
    header('Location: index.php');
    exit;
} else {
    $_SESSION['Error'] = '<br><br><h2>Please include all fields with a *. </h2><br><br>';
    header('Location: newEntry.php');
    exit;
}