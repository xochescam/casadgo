<?php 

$target = 'public_html/storage'; 
$shortcut = 'public/storage'; 
symlink($target, $shortcut); 

 ?>
