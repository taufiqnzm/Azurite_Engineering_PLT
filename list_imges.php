<?php
    $directory = 'img/gallery/';
    $images = glob($directory . '*.jpg');
    echo json_encode($images);
?>