<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- bootstrap CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<title>Add New Author</title>
</head>
<!--pengecekan/validator pake javascript-->
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
<h1 class="text-center">Add New Author</h1>
<div class="container text-center mt-5">
    <form name="form1" action="200030443-save.php" method="post" onSubmit="return cek_form(this)" enctype="multipart/form-data">
        <table>
            <tr>
                <td class="form-label" >ID Pengarang</td>
                <td><input type="text" name="id_pengarang" class="form-control" maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label" >Nama</td>
                <td><input type="text" name="nama" class="form-control" maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label" >Lokasi</td>
                <td><input type="text" name="alamat" class="form-control" maxlength="100"></td>
            </tr>
            <tr>
                <td class="form-label" >Email</td>
                <td><input type="text" name="email" class="form-control"  maxlength="100"></td>
            </tr>	
            <tr>
                <td class="form-label" >No. Telp</td>
                <td><input type="text" name="hp" class="form-control" maxlength="100"></td>
            </tr>
            <tr>
                <td class="form-label" >Foto</td>
                <td><input type="text" name="foto" class="form-control" maxlength="100"></td>
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
    <a href="index.php" class="btn btn-warning mt-5">Kembali</a>
</div>
</html>
