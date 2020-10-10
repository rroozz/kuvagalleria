<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$errors = [];

// check for fake image
if (isset($_POST['submit'])){
    $check = gettingmagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check == false){
        $errors[] = 'File is fake image';
    }
}

// check for file format 
$image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
if ($image_file_type != 'jpg' && $image_file_type != 'jpeg'){
    $errors[] = 'sorry, only jpeg-files are allowed';
}

// check for file size
if ($_FILES['fileToUpload']['size'] > 500000000){
    $errors[] = 'sorry, file is too large';
}

// check if file exists
if (file_exists($target_file)){
    $errors[] = 'sorry, file already exists';
}

if (count($errors) > 0){
    foreach ($errors as $error){
        echo $error. "<br>";{}
    }
} else {


    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
        echo "the file". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded";
        //tallenus xml-tiedostoon
        include_once 'my_functions.php';
        saveDataToXML($_POST, basename( $_FILES["fileToUpload"]["name"]));

    } else {  
        echo "tiedoston siirtämisessä tapahtui virhe";
    }
}