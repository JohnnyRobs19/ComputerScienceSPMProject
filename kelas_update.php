<?php
include ("sambungan.php");

$idkelas= $_POST["idkelas"];
$namakelas=$_POST["namakelas"];

$sql="update kelas set NamaKelas='$namakelas' where idkelas='$idkelas'";
echo $sql;

$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Dikemaskini')) document.location='kelas_insert.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>