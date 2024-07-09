<?php
include("sambungan.php");
$idsoalan=$_POST["idsoalan"];

$sql="delete from soalan where idsoalan='$idsoalan' ";
echo $sql; 
$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Dipadam')) document.location='soalan_delete.html';</script>";
else
    echo "Ralat: $sql<br>".mysqli_error($sambungan);
?>