<?php
if (isset($_POST['xsimpan'])) {
	$host="localhost";
	$user="root";
	$pass="";
	$db="universitas";
	$conn=mysqli_connect($host,$user,$pass,$db);
	if (!$conn) {
		die("Koneksi Gagal :".mysqli_connect_error());
	}else{
		// if (!empty($_POST['xnim']) AND !empty($_POST['xnama']) AND !empty($_POST['xnohp']) AND !empty($_POST['xjurusan'])) {
			$sql = "INSERT INTO siswa(nim,nama,nohp,jurusan)
			VALUES(
			'$_POST[xnim]',
			'$_POST[xnama]',
			'$_POST[xnohp]',
			'$_POST[xjurusan]'
		)";
		if (mysqli_query($conn,$sql)) {
			// echo "Berhasil Berhasil Berhasil Horeee.....";
			header("location: tampil.php");
		}else {
			echo "Error :".mysqli_error($conn);
		}
		// }else{
		// 	echo "Mohon Cek Data, Kolom bertanda bintang tidak boleh ada yang kosong";
		// }
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="tambah.php">
		<table align="center">
			<tr>
				<th colspan="3">Input Data Siswa</th>
			</tr>
			<tr>
				<td>No Induk*</td>
				<td>:</td>
				<td><input type="text" name="xnim" placeholder="Nomor Induk Mahasiswa" required></td>
			</tr>
			<tr>
				<td>Nama*</td>
				<td>:</td>
				<td><input type="text" name="xnama" placeholder="Nama Mahasiswa" required></td>
			</tr>
			<tr>
				<td>Nomor HP*</td>
				<td>:</td>
				<td><input type="text" name="xnohp" placeholder="No HP Mahasiswa" required></td>
			</tr>
			<tr>
				<td>Jurusan*</td>
				<td>:</td>
				<td><input type="text" name="xjurusan" placeholder="Jurusan Mahasiswa" required></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><input type="submit" value="Simpan" name="xsimpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>
