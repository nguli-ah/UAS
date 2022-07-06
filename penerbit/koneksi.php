<?php
/*=======================================================================================
NIM: 200030427
NAMA: I Made Toty Candra Gunawan
KELAS: BG203
=========================================================================================*/

$host="localhost";
$username="root";
$password="root";
$database="perpustakaan";

//membuat koneksi
$koneksi=mysqli_connect($host, $username, $password, $database);

//cek koneksi
if (!$koneksi) {
	//error
	die("Koneksi gagal: " .  mysqli_connect_error($koneksi));	
}
?>