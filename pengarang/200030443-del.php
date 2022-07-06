<?php
require "koneksi.php";

//PROSES MENGHAPUS DATA PENGARANG
$id_pengarang=$_GET['id']; 

//cek apakah User ID sudah ada dalam tabel t_buku (sebagai Foreign Key)
$sql ="select * from t_pengarang where (id_pengarang = '$id_pengarang')";

//eksekusi query select
$hasil = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//user tidak menjadi FK di tabel lain, melanjutkan proses delete
$sql="delete from t_pengarang where (id_pengarang = '$id_pengarang');";

//eksekusi perintah delete
$del = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//berhasil delete data user
if ($del){	
    //tampilkan messagebox berhasil simpan dan redirect ke halaman home.php
    echo "<script>alert('Pengarang telah berhasil dihapus.'); document.location='index.php'</script>";
} 
else {
    echo "<script>alert('Pengarang gagal dihapus. Silahkan ulangi kembali.'); document.location='index.php'</script>";
}
mysqli_close($koneksi);
?>