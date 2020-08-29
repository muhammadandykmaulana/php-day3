<?php
if (isset($_GET['id'])) {
	$host="localhost";
	$user="root";
	$pass="";
	$db="universitas";
	$conn=mysqli_connect($host,$user,$pass,$db);
	if (!$conn) {
		die("Koneksi Gagal :".mysqli_connect_error());
	}else{
		$sql = "SELECT * FROM siswa WHERE nim='$_GET[id]';
		$result = mysqli_query($conn,$sql);
		if ($jml=mysqli_num_rows($result)>0) {
			$sqlhapus = "DELETE FROM siswa WHERE nim='$_GET[id]';
			if (mysqli_query($conn,$sqlhapus)) {
				header("location: tampil.php");
			}else {
				echo "Error :".mysqli_error($conn);
			}
		}
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
</body>
</html>
