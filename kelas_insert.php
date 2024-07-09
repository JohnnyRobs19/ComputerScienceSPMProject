<?php
include("sambungan.php");

$idkelas= $_POST["idkelas"];
$namakelas= $_POST["namakelas"];

$sql="insert into kelas values('$idkelas','$namakelas')";

$result=mysqli_query($sambungan, $sql);
if ($result == true)
    echo "<script> if (confirm('Rekod Berjaya Ditambah')) document.location='kelas_insert.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>