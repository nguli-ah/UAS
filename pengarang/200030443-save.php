<?php
require "koneksi.php";

//PROSES MENYIMPAN DATA PENGARANG BARU
$id_pengarang = $_POST['id_pengarang'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$hp= $_POST['hp'];
$foto = $_POST['foto'];

$status = 1; 

$query ="select * from t_pengarang where (id_pengarang = '$id_pengarang')";
$result = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

$similar = "select nama from t_pengarang";

if (mysqli_num_rows($result) > 0 && $nama == $similar) {
    //category exist
    echo "<script>alert('This author is already exist!');
        document.location='add_author.php'</script>";
}
else {
    $query = "insert into t_pengarang (id_pengarang, nama, alamat, email, hp, status, foto)
    values ('$id_pengarang', '$nama', '$alamat', '$email', '$hp', '$status', '$foto');";

    //eksekusi perintah insert into
    $save = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

    if ($save){
        echo "<script>alert('Data telah berhasil disimpan.'); document.location='index.php'</script>";
    } 
    else {
        echo "<h1>Data gagal disimpan!</h1>"; 
        echo "<a href=\"200030443-add.php\">Ulangi Kembali</a>";
    }
}

mysqli_close($koneksi);
?>