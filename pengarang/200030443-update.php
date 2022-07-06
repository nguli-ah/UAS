<?php
require "koneksi.php";

//PROSES MENYIMPAN PERUBAHAN DATA PENGARANG
//data yang akan di kirim dari halaman view
$id_pengarang = $_POST['id']; //menampilkan id
$nama = $_POST['nama']; //menampilkan nama
$alamat = $_POST['alamat']; //menampilkan alamat
$email = $_POST['email']; //menampilkan email
$hp = $_POST['hp']; //menampilkan nomor hp
$status=$_POST['status']; //menampilkan status

$id_pengarang = $_GET['id'];

$nama_file = $_FILES['foto']['name']; //menyimpan nama file pada tabel
$asal_file = $_FILES['foto']['tmp_name']; //digunakan untuk upload file ke server

//directory lokasi Foto Profile pada server
//$_SERVER['DOCUMENT_ROOT'] -> Foder HTDOCS -> localhost
$tujuan_file = $_SERVER['DOCUMENT_ROOT'] . "/uas/pengarang/img-pengarang/".$_FILES['foto']['name']; //htdocs > uas > pengarang > img-user

//membuat variable untuk concate query sql dgn kondisi tertentu
$x="";
$y="";

//query basic
$x="UPDATE t_pengarang SET id_pengarang='$id_pengarang', nama='$nama', alamat='$alamat', email='$email', hp='$hp', status='$status'";

if ($nama_file != "") { //merubah foto jika ada file yg diupload
	$y=", foto='$nama_file' ";
}

//menggabungkan ketiga query dan menambahkan klausa where
$sql = $x . $y . " where (id_pengarang = '$id_pengarang')";

//eksekusi perintah update
$update = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//data berhasil di-update
if ($update){
	
	if ($nama_file != "") { //ada file yg diupload
		$copy = copy($asal_file, $tujuan_file);
    } //copy file foto ke server

	//tampilkan messagebox berhasil update dan redirect ke halaman home.php
	echo "<script>alert('Pengarang telah berhasil di-update.'); document.location='index.php'</script>";
} 
else {
	echo "<script>alert('Pengarang gagal di-update. Silahkan ulangi kembali.'); document.location='200030443-view.php?id=$id_pengarang'</script>";
}

mysqli_close($koneksi);
?>