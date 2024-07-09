<?php
include ("sambungan.php");

$idpelajar=$_POST["idpelajar"];

$sql="delete from pelajar where idpelajar='$idpelajar'";
echo $sql;
$result=mysqli_query($sambungan, $sql);
if ($result==true){
    $bilrekod=mysqli_affected_rows($sambungan);
    if ($bilrekod>0)
        echo "<script> if (confirm('Rekod Berjaya Dipadam')) document.location='pelajar_delete.html';</script>";
    else
        echo "Tidak berjaya padam, rekod tidak ada dalam jadual";
}
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>