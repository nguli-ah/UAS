<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MENAMPILKAN DATA PENERBIT YANG AKAN DI-UPDATE</title>
 <!-- bootstrap CSS-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	
<!--melakukan validasai terhadap inputan data menggunakan JavaScript -->
<script type="text/javascript">
function update_user(ubh){	
	if(ubh.nama.value==""){
		alert("Silahkan isi nama publisher anda");
		ubh.nama.focus();
		return false;
	}else if(ubh.kota.value==""){
		alert("Silahkan diisi nama kota anda"); 
		ubh.kota.focus();
		return false;
	}else if(ubh.kontak.value==""){
		alert("Silahkan diisi nama kontak anda");
		ubh.kontak.focus();
		return false;
	}else if(ubh.hp.value==""){
		alert("Silahkan diisi no hp anda");
		ubh.hp.focus();
		return false;	
	}else if(ubh.alamat.value==""){
		alert("Silahkan lengkapi kolom Handphone");
		ubh.alamat.focus();
		return false;	
	}else if(ubh.email.value==""){
		alert("Silahkan diisi email anda");
		ubh.email.focus();
		return false;
	}else if(ubh.status.value==""){
		alert("Silahkan lengkapi kolom Handphone");
		ubh.status.focus();
		return false;
	}else return true;
}
</script>
	
</head>
<body>
<h1 class="text-center">MENGUBAH DATA PENERBIT</h1>
<div class="container mt-5">
<?php
require "koneksi.php";
//data dari halaman home.php dimasukkan ke dalam variable dgn method GET
$org=$_GET['id']; 

//load data User sesuai dengan User ID
$querydb ="select * from t_penerbit where (id_penerbit = '$org')";

//eksekusi query
$queryhasil = mysqli_query($koneksi,$querydb) or die (mysqli_error($koneksi));

//jika record ditemukan
if (mysqli_num_rows($queryhasil) > 0) {
	
//Menampilkan data user pada script HTML
$data=mysqli_fetch_array($queryhasil);
?>

<!--input data akan diproses pada halaman user-save.php-->
<form name="form1" action="200030427-update.php?id=<?= $org ?>" method="post" onSubmit="return update_user(this)" enctype="multipart/form-data">
<!--method:POST -> ID/pengenal yg akan diparsing adalah atribut "name" pada masing-masing control-->
<!--enctype="multipart/form-data" digunakan untuk kebutuhan upload file -->
    <table>
        <tr>
            <td class="form-label">Nama Penerbit</td>
			<!--menyisipkan kode PHP pada script HTML-->
            <td><input type="text" name="nama" class="form-control"  maxlength="50" value="<?php echo "$data[nama]"; ?>"></td>
        </tr>
		<tr>
            <td class="form-label">Lokasi</td>
            <td><input type="text" name="kota" class="form-control"  maxlength="50" value="<?php echo "$data[kota]"; ?>"></td>
        </tr>
		<tr>
            <td class="form-label">Nama Kontak</td>
            <td><input type="text" name="kontak" class="form-control"  maxlength="50" value="<?php echo "$data[contact_name]"; ?>"></td>
        </tr>
		<tr>
            <td class="form-label">Kontak Hp</td>
            <td><input type="number" name="hp" class="form-control"  maxlength="12" value="<?php echo "$data[contact_phone]"; ?>"></td>
        </tr>
		<tr>
            <td class="form-label">Alamat</td>
            <td><input type="text" name="alamat" class="form-control"  maxlength="50" value="<?php echo "$data[alamat]"; ?>"></td>
        </tr>
        <tr>
            <td class="form-label">Email</td>
            <td><input type="text" name="email" class="form-control"  maxlength="60" value="<?php echo "$data[email]"; ?>"> </td>
        </tr>       
        <tr>
            <td class="form-label">Status</td>
            <td>         
            <input name="status" type="radio" id="sts" value="1" <?php if($data['status']==1){ echo "checked=checked";}  ?>/> Aktif
			<input name="status" type="radio" id="sts" value="0" <?php if($data['status']==0){ echo "checked=checked";}  ?>/> Non-Aktif
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" class="btn btn-primary">
            <input type="reset" value="Reset" class='btn btn-danger'></td>
        </tr>
    </table>
</form>

<?php
}

else {//tidak ada user dengan id yg digunakan 
	echo "<script>alert('Data User tidak ditemukan.');
		  document.location='index.php'</script>";
}
?>
</div>

<div class="container text-center mt-5"> 
	<h2><a href="index.php"  class="btn btn-warning mt-5">Kembali</a></h2>
	</div>
	
</body>
</html>
