<?php

	/* Mengambil file dari hosting lama */
	/* File juga bisa diambil dari IP tertentu */

	$content = file_get_contents("http://apites.sookawebtarakan.com/pwa3.zip");


	/* Menyimpan file di hosting baru. pada folder yang diinginkan */

	$fp = fopen("/home/cahayaab/kedai.cahayaabadimotor.co.id/pwa3.zip", "w");

	fwrite($fp, $content);

	fclose($fp); 

?>