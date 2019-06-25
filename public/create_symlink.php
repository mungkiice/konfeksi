<?php 
$target = __DIR__.'/../konveksi/storage/app/public';
$link = __DIR__.'/storage';
symlink($target, $link);

echo readlink($link);
?>