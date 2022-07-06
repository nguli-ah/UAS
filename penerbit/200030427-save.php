<?php
    require "koneksi.php";

    //PROSES MENYIMPAN DATA PENERBIT BARU
    $id_penerbit = $_POST['id_penerbit'];   
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];
    $contact_name = $_POST['contact_name'];
    $contact_phone = $_POST['contact_phone'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $status = 1; 

    $query ="select * from t_penerbit where (id_penerbit= '$id_penerbit')";
    $result = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

    $similar = "select contact_name from t_penerbit";

    if (mysqli_num_rows($result) > 0 && $contact_name == $similar) {
        //category exist
        echo "<script>alert('This publisher is already exist!');
            document.location='add_publisher.php'</script>";
    }
    else {
        $query = "insert into t_penerbit (id_penerbit, nama, kota, contact_name, contact_phone, alamat, email, status)
        values ('$id_penerbit', '$nama', '$kota', '$contact_name', '$contact_phone', '$alamat', '$email', $status);";

        //eksekusi perintah insert into
        $save = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

        if ($save){
            echo "<script>alert('Data telah berhasil disimpan.'); document.location='index.php'</script>";
        } 
        else {
            echo "<h1>Data gagal disimpan!</h1>"; 
            echo "<a href=\"200030427-add.php\">Ulangi Kembali</a>";
        }
    }
mysqli_close($koneksi);
?>