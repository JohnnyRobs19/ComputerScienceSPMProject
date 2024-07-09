<?php
include ('sambungan.php');
session_start();

if (isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    
    $sql="select * from pelajar";
    $result=mysqli_query($sambungan,$sql);
    $jumpa=FALSE; 
    while ($pelajar=mysqli_fetch_array($result)){
        // Kod bagi Menentukan sama ada ID dan Password yang dimasukkan ada dalam Jadual Pelajar 
        if ($pelajar['IDPelajar']==$userid && $pelajar["Password_Pelajar"]==$password){
            $jumpa=TRUE;
            $_SESSION['username']=$pelajar['IDPelajar'];
            $_SESSION['nama']=$pelajar['NamaPelajar'];
            $_SESSION['status']='pelajar';
            break;
        } 
    }
         // Kod bagi Menentukan sama ada ID dan Password yang dimasukkan ada dalam Jadual Guru
        if ($jumpa==FALSE){
            $sql="select * from guru";
            $result=mysqli_query($sambungan, $sql);
            while ($guru=mysqli_fetch_array($result)){
                if ($guru['IDGuru']==$userid && $guru["Password_Guru"]==$password){
                    $jumpa=TRUE;
                    $_SESSION['username']=$guru['IDGuru'];
                    $_SESSION['nama']=$guru['NamaGuru'];
                    $_SESSION['status']='guru';
                    break;
                }
            }
        } 
    if ($jumpa==TRUE){
        header ("Location: utama.html");
    }
    else
        echo "<script>alert('Kesalahan pada Username atau Password. Sila Cuba Sekali Lagi.')</script>"; 
}
?>
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="boranglogin.css">
<div class="container">
    <iframe class="header" src="header.html" name=header></iframe>
</div>
    <h3 class="panjang">LOG MASUK</h3>
    <form class="panjang" action=login.php method="post" class="login">
        <table>
            <tr>
                <td><img src="user.png"></td>
                <td><input type="text" name="userid" placeholder="No. IC anda"></td>
            </tr>
            <tr>
                <td><img src="lock.png"></td>
                <td><input type="password" name="password" placeholder="password"></td>
            </tr>
        </table>
        <button class="login" type="submit" img src="signin.png">Log Masuk</button>
    </form>
