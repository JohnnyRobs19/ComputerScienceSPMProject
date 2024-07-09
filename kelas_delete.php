<?php
include("sambungan.php");
$idkelas=$_POST["idkelas"];

$sql="delete from kelas where idkelas= '$idkelas' ";
echo $sql;
$result=mysqli_query($sambungan,$sql);
if ($result==true)
    //echo "berjaya dipadam";
    echo "<script> if (confirm('Rekod Berjaya Dipadam')) document.location='kelas_delete.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>