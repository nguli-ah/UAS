<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap CSS-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Add Penerbit</title>
</head>
<script type="text/javascript">
    function cek_form(frm){	
        if(frm.id_penerbit.value==""){
            alert("Please fill the coloumn penerbit ID");
            frm.id_penerbit.focus();
            return false;
        }
        else if(frm.nama.value == ""){
            alert("Please fill the coloumn nama");
            frm.nama.focus();
            return false;
        }
        else if(frm.kota.value == ""){
            alert("Please fill the coloumn kota");
            frm.kota.focus();
            return false;
        }
        else if(frm.contact_name.value == ""){
            alert("Please fill the coloumnc contact name");
            frm.contact_name.focus();
            return false;
        }
        else if(frm.contact_phone.value == ""){
            alert("Please fill the coloumn contact phone");
            frm.contact_phone.focus();
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
        else return true;
    }
</script>
<body>
<h1 class="text-center">Tambah Penerbit Baru</h1>
<div class="container text-center mt-5">
    <form name="form1" action="200030427-save.php" method="post" onSubmit="return cek_form(this)" enctype="multipart/form-data">
        <table>
            <tr>
                <td class="form-label">ID Penerbit</td>
                <td><input type="text" name="id_penerbit" class="form-control" maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label">Nama</td>
                <td><input type="text" name="nama" class="form-control" maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label">Kota</td>
                <td><input type="text" name="kota" class="form-control" maxlength="100"></td>
            </tr>
            <tr>
                <td class="form-label">Contact Name</td>
                <td><input type="text" name="contact_name" class="form-control" maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label">Contact Phone</td>
                <td><input type="text" name="contact_phone" class="form-control" maxlength="150"></td>
            </tr>
            <tr>
                <td class="form-label">Alamat</td>
                <td><input type="text" name="alamat" class="form-control" maxlength="100"></td>
            </tr>
            <tr>
                <td class="form-label">Email</td>
                <td><input type="text" name="email" class="form-control" maxlength="100"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" class="btn btn-primary">
                <input type="reset" value="Reset" class='btn btn-danger'></td>
            </tr>
        </table>
    </form>
</div>
<div class="container text-center mt-5">  
    <h2><a href="index.php" class="btn btn-warning mt-5">Kembali</a></h2>
</div>
</body>
</html>