<?php
require "koneksi.php";

//data dari halaman user-view.php dimasukkan ke dalam variable dgn method POST
$publiser=$_POST['nama']; //input name="user" 
$kota=$_POST['kota']; //input name="nama"
$kontak=($_POST['kontak']); //input name="kontak"
$hp=$_POST['hp']; //input name="hp"
$alamat=$_POST['alamat']; //input name="alamat"
$email=$_POST['email']; //input name="email"
$status=$_POST['status']; //input name="status"

$org=$_GET['id']; 

//query basic
$querydb="UPDATE `t_penerbit` SET `nama`='$publiser',`kota`='$kota',`contact_name`='$kontak',`contact_phone`='$hp',`alamat`='$alamat',`email`='$email',`status`='$status' WHERE id_penerbit = '$org'";

//eksekusi perintah update
$queryhasil = mysqli_query($koneksi,$querydb) or die (mysqli_error($koneksi));

//data berhasil di-update
if ($queryhasil){
	
	//tampilkan messagebox berhasil update dan redirect ke halaman home.php
	echo "<script>alert('User telah berhasil di-update.'); document.location='index.php'</script>";
} 
else {
	echo "<script>alert('User gagal di-update. Silahkan ulangi kembali.'); document.location='200030427-view.php?id=$org'</script>";}

//menutup koneksi
mysqli_close($koneksi);

?>