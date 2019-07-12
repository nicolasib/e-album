<?php 
    $imageData = file_get_contents($_FILES['path']['tmp_name']);
    echo "data:image/png;base64," . base64_encode($imageData);
?>