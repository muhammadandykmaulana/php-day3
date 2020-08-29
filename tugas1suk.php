<?php
/*
soal simulasi uji kompetensi (3 jam)

1. Buat algoritma (flowchart) dan program dengan ketentuan:
  a. berfungsi u/ menerima inputan jumlah masing2 angka dalam string
  b. Prosesnya adalah menghitung jumlah masing2 angka dalam string
  c. hasil proses disimpan dalam file hasil.txt disertai tanggal dan waktu eksekusi
  d. isi file hasil.txt selalu bertambah (tidak di overwrite)
*/
?>
<!DOCTYPE html>
<html>
<body>
<?php
if (!file_exists("hasil.txt")) {
	if (fopen("hasil.txt","w")) {
		echo "Berhasil Membuat berkas hasil.txt";
	}
}
	date_default_timezone_set('Asia/Jakarta');
	if (isset($_POST['calculate'])) {
      $data=$_POST['input'];
      $data=strtolower($data);
      $myfile=fopen("hasil.txt", "a") or die("Unable to open file and write ");
      fwrite($myfile, date('H:i d/m/Y')." ");
      foreach (count_chars($data,1) as $key => $jumlah) {
        if (is_numeric(chr($key)))
        {
          fwrite ($myfile, (chr ($key)." = ".$jumlah.", "));
          // $hasildata=chr($key) ."=".$jumlah.", ";
          // fwrite($myfile, $hasildata);
        }
	}
}
	?>
	<form method="post" action="tugas1suk.php">
		Inputkan kata/string : <input type="text" name="input" required>
		<input type="submit" name="calculate">
	</form>
	<?php
	$myfile=fopen("hasil.txt", "r") or die("Unable to open and write");
	while(!feof($myfile)) {
	  echo fgets($myfile) . "<br>";
	}
	fclose($myfile);
	?>

</body>
</html>
