<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$cari="";
	if (isset($_GET['xkata'])) {
		$cari=$_GET['xkata'];
	}
	?>
	<form method="get" action="tampil.php">
		<table>
			<tr>
				<td width="100px">
				<button><a href="tambah.php">Tambah Data</a></button>
				</td>
				<td width="150px">
					<input type="text" name="xkata" value="<?php echo $cari ?>">
				</td>
				<td width="100px">
					<input type="submit" name="cari" value="Cari">
					<a href="tampil.php">Batal</a>
				</td>
			</tr>
		</table>
	</form>
	<table border="1" width="100%">
		<tr>
			<th width="10%">NIM</th>
			<th width="20%">Nama</th>
			<th width="40%">No HP</th>
			<th width="20%">Jurusan</th>
			<th width="10%">Aksi</th>
		</tr>
		<?php
		$hal = "1";
		if(isset($_GET["hal"])){
			$hal = $_GET["hal"];
		}
		$host="localhost";
		$user="root";
		$pass="";
		$db="universitas";
		$baris = 3;
		$conn=mysqli_connect($host,$user,$pass,$db);
		if (!$conn) {
			die("Koneksi Gagal :".mysqli_connect_error());
		}else{
			$sql = "SELECT * FROM siswa WHERE nama LIKE '%$cari%' OR nohp LIKE '%$cari%' LIMIT ". $baris ."
		OFFSET ". ($hal-1)*$baris ."";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result)>0) {
				while ($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td>&nbsp;<?php echo $row['0'] ?></td>
					<td><?php echo $row['1'] ?></td>
					<td><?php echo $row['2'] ?></td>
					<td><?php echo $row['3'] ?></td>
					<td align="center"><a href="ubah.php?id=<?php echo $row['0'] ?>">Ubah</a> || <a onclick="return confirm ('Bist du sicher, dass du dich Abmelden möchtest?')" href="hapus.php?id=<?php echo $row['0'] ?>">Hapus</a></td>
				</tr>
				<?php
				}
			}else{
				echo "Tidak Ada Data Dalam Halaman Ini";
			}
		}
		// mysqli_close($conn);
		?>
	</table>
	<?php
	$sqli = "SELECT * FROM siswa WHERE nama LIKE '%$cari%' OR jurusan LIKE '%$cari%'";
	$resulti = mysqli_query($conn,$sqli);
	for($i=1; $i<=ceil(mysqli_num_rows($resulti)/$baris); $i++){
		?>
		<a href='tampil.php?xkata=<?php echo $cari?>&hal=<?php echo $i;?>'><?php echo $i; ?></a>
		<?php
		// echo "Halaman : <a href='tampil.php?xkata=$cari&hal=$i'>$i</a> ";
	}
	?>
</body>
</html>
