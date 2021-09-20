<?php
//ambil file
$content = file_get_contents("http://abaya.faipagun.idxc.me/.well-known.zip");
//simpan di server hosting baru.
$fp = fopen("/home/kedaiolala/public_html/.well-known.zip", "w");
fwrite($fp, $content);
fclose($fp);
 ?>