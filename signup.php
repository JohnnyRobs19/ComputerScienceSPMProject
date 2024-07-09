<?php
include ('sambungan.php');
session_start();
debug("in signup.php");
if (isset($_POST['idpelajar'])){
    $idpelajar=$_POST["idpelajar"];
    $namapelajar=$_POST["namapelajar"];
    $idkelas=$_POST["idkelas"];
    $password_pelajar=$_POST["password_pelajar"];
    // Kod bagi Memeriksa sama ada IDPelajar ada 12 aksara
    if (isset($_POST['idpelajar'])){
            $idpelajar=$_POST['idpelajar'];
            if (strlen($idpelajar)==12){
                 $sql="insert into pelajar values('$idpelajar','$namapelajar','$idkelas','$password_pelajar')";
            }
        // Pop Up bagi Aksara IDPelajar yang Tidak Mencukupi
            else{
                echo "<script> if (confirm('Aksara dalam IDPelajar tidak mencukupi. Sila isi sekali lagi.')) document.location='signup.php';</script>";
            }
        }
    debug($sql);  
    $result=mysqli_query($sambungan,$sql);
    $ralat=$sql.mysqli_error($sambungan);
    /* $sqlselect="select * from pelajar";
    $resultselect=mysqli_query($sambungan,$sql); */
    
    
    if($result) {
        echo "<script> if (confirm('Berjaya sign up')) document.location='utama.html';</script>";
        
        
       $_SESSION['status']='pelajar'; 
      $_SESSION['nama']=$namapelajar;
       $debug_nama = $_SESSION['nama'];
        debug ("Nama Pelajar: $debug_nama");
    } 
    //Pop-Up bagi Sign Up yang tidak berjaya yang tidak disebabkan oleh aksara yang tidak mencukupi
    else {
        echo "<script> if (confirm('Kesalahan pada Username atau Password. Sila Cuba Sekali Lagi.')) document.location='signup.php';</script>";
    } 
}
?>
<link rel="stylesheet" href="boranglogin.css">
<link rel="stylesheet" href="button.css">
<div class="container">
    <iframe class="header" src="header.html" name=header></iframe>
</div>
    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pelajar</td>
            <td><input type="text" name="idpelajar" placeholder="nombor IC anda"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="namapelajar" placeholder="nama anda"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
            <select name="idkelas">
            <?php
            $sql="select * from kelas";
            $data=mysqli_query($sambungan,$sql);
            while ($kelas=mysqli_fetch_array($data)){
                echo "<option value='$kelas[IDKelas]'>$kelas[NamaKelas]</option>";
                }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Password_Pelajar</td>
            <td><input type="text"name="password_pelajar" placeholder="password"></td>
        </tr>
    </table>
        <!-- Tempat Button akan ditujukan selepas ditekan-->
        <button class="tambah" type="submit">Daftar</button>
        <button class="update" type="button" onclick="window.location='signup.php'">Reset</button>
        <button class="login" type="button" onclick="window.location='login.php'">Log Masuk</button>
</form>