<?php
include ("sambungan.php");

$idguru=$_POST["idguru"];
?>

<!--
$sql="update guru set NamaGuru='$namaguru', Password_Guru='$password' where IDGuru='$idguru' ";
echo $sql; 

$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Dikemaskini')) document.location='guru_update.html';</script>";
else 
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
-->
