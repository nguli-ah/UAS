<?php
    require "koneksi.php";
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <title> Form Ubah Data Pengarang</title>
    </head>
    <script type="text/javascript">
        function cek_form(frm){	
            if(frm.id_pengarang.value==""){
                alert("Please fill the coloumn pengarang ID");
                frm.id_pengarang.focus();
                return false;
            }
            else if(frm.nama.value == ""){
                alert("Please fill the coloumn nama");
                frm.nama.focus();
                return false;
            }
            else if(frm.alamat.value == ""){
                alert("Please fill the coloumn alamat");
                frm.alamat.focus();
                return false;
            }
            else if(frm.email.value == ""){
                alert("Please fill the coloumn email");
                frm.email.focus();
                return false;
            }
            else if(frm.hp.value == ""){
                alert("Please fill the coloumn hp");
                frm.hp.focus();
                return false;
            }
            else if(frm.foto.value == ""){
                alert("Please fill the coloumn foto");
                frm.foto.focus();
                return false;
            }
            else return true;
        }
    </script>
    <body>
        <h1 class="text-center">UBAH DATA PENGARANG</h1>
        <div class="container mt-5">
        <?php
            //data dari halaman home.php dimasukkan ke dalam variable dgn method GET
            $id_pengarang = $_GET['id']; 

            //load data User sesuai dengan User ID
            $sql ="select * from t_pengarang where (id_pengarang = '$id_pengarang')";

            //eksekusi query
            $hasil = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

            //jika record ditemukan
            if (mysqli_num_rows($hasil) > 0) {
                
                //Menampilkan data user pada script HTML
                $data=mysqli_fetch_array($hasil);
        ?>

        <form name="form1" action="200030443-update.php?id=<?=$id_pengarang?>" method="post" onSubmit="return cek_form(this)" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="form-label">ID Pengarang</td>
                    <td><input type="text" name="id_pengarang" class="form-control"  maxlength="100" value="<?php echo "$data[id_pengarang]"; ?>" readonly></td>
                </tr>	
                <tr>
                    <td class="form-label">Nama</td>
                    <td><input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo "$data[nama]"; ?>"></td>
                </tr>	
                <tr>
                    <td class="form-label">Lokasi</td>
                    <td><input type="text" name="alamat" class="form-control" maxlength="100" value="<?php echo "$data[alamat]"; ?>"></td>
                </tr>
                <tr>
                    <td class="form-label">Email</td>
                    <td><input type="text" name="email" class="form-control" maxlength="100" value="<?php echo "$data[email]"; ?>"></td>
                </tr>	
                <tr>
                    <td class="form-label">No. Telp</td>
                    <td><input type="text" name="hp" class="form-control" maxlength="100" value="<?php echo "$data[hp]"; ?>"></td>
                </tr>
                <tr>
                    <td class="form-label">Foto</td>
                    <td><input name="foto"  type="file"></td>
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
            <h2><a href="index.php" class="btn btn-warning mt-5">Kembali</a></h2>
        </div>
    </body>
</html>