<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- bootstrap CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<title>Daftar Penerbit</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Navigator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Penerbit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pengarang/index.php">Pengarang</a>
        </li>
      </ul>
    </div>
</nav>
<?php 
        require "koneksi.php";

        $query ="select * from t_penerbit
                        order by nama asc";

        //menjalankan query ke database
        $hasil = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

        //result set lebih > 0 (query mengahasilkan record data)
        if (mysqli_num_rows($hasil) > 0) {
            
            echo "<h1 class=\"text-center\">DAFTAR PENERBIT BUKU</h1>"; //caption
            
            //menampilkan jumlah data
            echo "<h3 class=\"mt-5\">Kumpulan data: ". mysqli_num_rows($hasil)." penerbit </h3>";
            
            $counter = 1; //membuat nomor urut data
            //menampilkan record ke web (bentuk tabel)
            //membuat header tabel
            echo "<table border=\"1\" class=\"table table-striped table-bordered table-hover\">
                    <tr class=\"table-dark\">
                        <th scope=\"col\" class=\"text-center\">No</th>
                        <th scope=\"col\" class=\"text-center\">Nama Penerbit</th>
                        <th scope=\"col\" class=\"text-center\">Contact Person</th>
                        <th scope=\"col\" class=\"text-center\">Lokasi</th>
                        <th scope=\"col\" class=\"text-center\">Contact Phone</th>
                        <th scope=\"col\" class=\"text-center\">Alamat</th>
                        <th scope=\"col\" class=\"text-center\">Email</th>
                        <th scope=\"col\" class=\"text-center\">Status</th>
                        <th scope=\"col\" colspan=\"2\" class=\"text-center\">Action</th> <!--colspan 2 = merge cell 2 kolom-->
                    </tr>";
            
            //membuat isi tabel dalam perulangan / looping
            while($data = mysqli_fetch_array($hasil)) { //array -> bisa menggunakan nama field/atribut bisa juga menggunakan indeks
                //konversi status ke gambar 
                $img_sts = "ok.png";
                $tip_sts = "Aktif";

                if ($data["status"] == 0) {
                    $img_sts="ko.png";
                    $tip_sts="Non Aktif";
                }

                echo "<tr class='text-center'>
                        <td>$counter</td>
                        <td>$data[nama]</td>
                        <td>$data[contact_name]</td>
                        <td>$data[kota]</td>
                        <td>$data[contact_phone]</td>
                        <td>$data[alamat]</td>
                        <td>$data[email]</td>
                        <td>
                            <img src=\"$img_sts\" alt=\"status\" title=\"$tip_sts\">
                        </td> 
                        <td>
                            <a href=\"200030427-view.php?id=$data[id_penerbit]\" class='btn btn-primary'><i class='bi bi-pencil'></i> Ubah</a> 
			            </td>
                        <td>
                            <a href=\"200030427-del.php?id=$data[id_penerbit]\"class='btn btn-danger'> <i class='bi bi-trash'></i> Hapus</a>
                        </dt>
                    </tr>";
                $counter++;//increment
            }
            
            //tutup tag table
            echo "</table>";
        } 
        else {
            echo "<h3>Data tidak tersedia!</h3>";	
        }

        //menutup koneksi
        mysqli_close($koneksi);
    ?>
    <h2><a href="200030427-add.php" class='btn btn-outline-dark mb-2'><i class="bi bi-person-plus"></i>Tambah Penerbit Baru</a></h2>
</body>
</html>
