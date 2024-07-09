<?php
include ("sambungan.php");

$idsoalan=$_POST["idsoalan"];
$namasoalan=$_POST["namasoalan"];
$pilihanA=$_POST["pilihanA"];
$pilihanB=$_POST["pilihanB"];
$pilihanC=$_POST["pilihanC"];
$jawapan=$_POST["jawapan"];
$idguru=$_POST["idguru"];

$sql="insert into soalan values('$idsoalan','$namasoalan','$pilihanA','$pilihanB','$pilihanC','$jawapan','$idguru')";

$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Ditambah')) document.location='soalan_insert.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>