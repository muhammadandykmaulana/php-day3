<?php
// if (!file_exists("hasil.txt")) {
// 	if (fopen("hasil.txt","w")) {
// 		echo "Berhasil Membuat berkas hasil.txt";
// 	}
// }
// else{
	date_default_timezone_set('Asia/Jakarta');
	if (isset($_POST["inputan"])) {
		$data = $_POST["tulisan"];
		// $tokata = str_word_count($data);
		// $data = strtolower($data);
		$myfile=fopen("hasil.txt", "a") or die("Tidak dapat menulis");
		fwrite($myfile, date('H:i d/m/Y')." ");
		foreach (count_chars($data, 1) as $huruf => $jumlah) {
			if(is_numeric(chr($huruf))){
				$hasildata=chr($huruf) ."=".$jumlah.", ";
				fwrite($myfile, $hasildata);
			}
		}fwrite($myfile, "\n");
	}
// }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>INPUTEN WORD</title>
 </head>
 <body>
 <form method="post" action="simulasi.php" >
 	<input type="text" name="tulisan">
 	<input type="submit" name="inputan" value="Simpan">
 </form>
 </body>
 </html>
