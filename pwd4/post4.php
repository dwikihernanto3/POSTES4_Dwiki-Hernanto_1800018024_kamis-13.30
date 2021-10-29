<html>

<head>
	<style>
		.error {
			color: #FF0000;
		}
	</style>
</head>

<body>
	<?php
	// mendefinisikan variabel dan mengatur nilai awalnya sama dengan kosong
	$namaErr = $nimErr = $genderErr = $angkatanErr = $prodi = "";
	$nama = $nim = $gender = $angkatan = $prodi = "";
	//kondisi jika request dari inputan form menggunakan metode POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["nama"])) {
			$namaErr = "Nama harus diisi";
		} else {
			$nama = test_input($_POST["nama"]);
		}
		if (empty($_POST["nim"])) {
			$nimErr = "NIM harus diisi";
		} else {
			$nim = test_input($_POST["nim"]);
		}
		if (empty($_POST["prodi"])) {
			$prodi = "Prodi harus diisi";
		} else {
			$prodi = test_input($_POST["prodi"]);
		}

		if (empty($_POST["angkatan"])) {
			$angkatan = "";
		} else {
			$angkatan = test_input($_POST["angkatan"]);
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender harus dipilih";
		} else {
			$gender = test_input($_POST["gender"]);
		}
	}
	//membuat fungsi untuk test_input
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
	<h2>Data Mahasiswa </h2>

	<p><span class="error">* Harus Diisi.</span></p>
	<form method="post" action="<?php
								echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<table>
			<tr>
				<td>Nama:</td>
				<!-- membuat form nama -->
				<td><input type="text" name="nama">
					<span class="error">* <?php echo $namaErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>NIM: </td>
				<!-- membuat input untuk mengisikan email -->
				<td><input type="text" name="nim">
					<span class="error">* <?php echo $nimErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>Prodi:</td>
				<!-- membuat input untuk mengisikan website -->
				<td> <input type="text" name="prodi">
					<span class="error">* <?php echo $prodi; ?></span>
				</td>
			</tr>

			<tr>
				<td>Angkatan:</td>
				<!-- membuat input untuk mengisikan komentar -->
				<td> <input type="text" name="angkatan">
					<span class="error"> <?php echo $angkatanErr; ?></span>
			</tr>

			<tr>
				<td>Jenis Kelamin:</td>
				<td>
					<!-- membuat input untuk mengisikan jenis kelamin (gender) -->
					<input type="radio" name="gender" value="L">Laki-Laki
					<input type="radio" name="gender" value="P">Perempuan
					<span class="error">* <?php echo $genderErr; ?></span>
				</td>
			</tr>

			<td>
				<!-- membuat input untuk submit data -->
				<input type="submit" name="submit" value="Submit">
			</td>
		</table>
	</form>

	<?php
	//menampilkan hasil data
	echo "<h2>Data yang anda isi:</h2>";
	echo $nama;
	echo "<br>";
	echo $nim;
	echo "<br>";
	echo $prodi;
	echo "<br>";
	echo $angkatan;
	echo "<br>";
	echo $gender;
	?>
</body>

</html>