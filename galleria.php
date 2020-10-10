<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
    .myPic {
        width: 10%;
    }
    </style>
</head>
<body>
<?php $link_name = 'Upload'; ?>
<a href="index.php?id=2"><?php echo $link_name; ?></a>
    <h1>Gallery</h1>
    <?php
    $xml =simplexml_load_file('data/galleria.xml');
    ?>
    <?php foreach ($xml->picture as $pic): ?>
        <div>
            <h2><?php echo $pic->author; ?></h2>
            <img src="uploads/<?php echo $pic->file;?>" alt="kuva" class="myPic" />
            <p><?php echo $pic->date; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>