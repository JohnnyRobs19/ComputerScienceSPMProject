<?php
include ("sambungan.php");

$idsoalan=$_POST["IDSoalan"];
$namasoalan=$_POST["NamaSoalan"];
$pilihanA=$_POST["PilihanA"];
$pilihanB=$_POST["PilihanB"];
$pilihanC=$_POST["PilihanC"];
$jawapan=$_POST["Jawapan"];
$idguru=$_POST["IDGuru"];

$sql="update soalan set NamaSoalan='$namasoalan', PilihanA='$pilihanA', PilihanB='$pilihanB',PilihanC='$pilihanC',Jawapan='$jawapan',IDGuru='$idguru' where IDSoalan='$idsoalan' ";
echo $sql; 

$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Dikemaskini')) document.location='soalan_update.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>