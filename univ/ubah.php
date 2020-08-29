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
			$sql = "UPDATE siswa SET
			nim='$_POST[xnim]',
			nama='$_POST[xnama]',
			nohp='$_POST[xnohp]',
			jurusan='$_POST[xjurusan]' WHERE nim='$_POST[xnim]'";
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
	mysqli_close($conn);
}
if (isset($_GET['id'])) {
	$host="localhost";
	$user="root";
	$pass="";
	$db="universitas";
	$conn=mysqli_connect($host,$user,$pass,$db);
	if (!$conn) {
		die("Koneksi Gagal :".mysqli_connect_error());
	}else{
		$sql = "SELECT * FROM siswa WHERE nim='$_GET[id]'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="ubah.php">
		<table>
			<tr>
				<td>No Induk*</td>
				<td>:</td>
				<td><input type="text" name="xnim" value="<?php echo $row['0'] ?>" readonly placeholder="Nomor Induk Siswa" required></td>
			</tr>
			<tr>
				<td>Nama*</td>
				<td>:</td>
				<td><input type="text" name="xnama" value="<?php echo $row['1'] ?>" placeholder="Nama Siswa" required></td>
			</tr>
			<tr>
				<td>nohp*</td>
				<td>:</td>
				<td><input type="text" name="xnohp" value="<?php echo $row['2'] ?>" placeholder="nohp Siswa" required></td>
			</tr>
			<tr>
				<td>No Telp.*</td>
				<td>:</td>
				<td><input type="text" name="xjurusan" value="<?php echo $row['3'] ?>" placeholder="No Telepon Siswa" required></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><input type="submit" value="Simpan" name="xsimpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>
