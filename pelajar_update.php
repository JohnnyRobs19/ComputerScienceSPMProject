<?php
include ("sambungan.php");

$idpelajar=$_POST["idpelajar"];
$namapelajar=$_POST["namapelajar"];
$idkelas=$_POST["idkelas"];
$password=$_POST["password_pelajar"];

$sql="update pelajar set namapelajar='$namapelajar', idkelas='$idkelas', password_pelajar='$password' where idpelajar='$idpelajar' ";
echo $sql;
$result=mysqli_query($sambungan,$sql);
if ($result=true)
    echo "<script> if (confirm('Rekod Berjaya Dikemaskini')) document.location='pelajar_update.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>