<?php
include("sambungan.php");

$idguru=$_POST["idguru"];
$namaguru=$_POST["namaguru"];
$password=$_POST["password_guru"];

$sql="insert into guru values ('$idguru','$namaguru','$password')";

echo $sql;
$result=mysqli_query($sambungan, $sql);
if ($result == true)
    echo "<script> if (confirm('Rekod Berjaya Ditambah')) document.location='guru_insert.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>