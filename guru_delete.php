<?php
    include("sambungan.php");
    $idguru=$_POST["idguru"];

    $sql="delete from guru where idguru= '$idguru' ";
    echo $sql; 
    $result=mysqli_query($sambungan,$sql);
    if ($result==true)
        echo "<script> if (confirm('Rekod Berjaya Dipadam')) document.location='guru_delete.html';</script>";
    else
        echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>