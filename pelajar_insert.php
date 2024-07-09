<?php
include ("sambungan.php");

$idpelajar=$_POST["idpelajar"];
$namapelajar=$_POST["namapelajar"];
$idkelas=$_POST["idkelas"];
$password=$_POST["password_pelajar"];

$sql="insert into pelajar values ('$idpelajar','$namapelajar','$idkelas','$password')"; 

echo $sql;
$result=mysqli_query($sambungan, $sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Ditambah')) document.location='pelajar_insert.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>
