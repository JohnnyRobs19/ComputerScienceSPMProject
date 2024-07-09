<?php
    include ('sambungan.php');

    session_start();
    $idpelajar=$_SESSION['username'];
    
    $sql="select * from kuiz where idpelajar='".$idpelajar."'";
    $data=mysqli_query($sambungan,$sql);
    //semak sama ada pelajar dah jawab atau belum
    if (mysqli_num_rows($data)>0)
        header ("Location: jawab_ulangkaji.php");
    else
        header ("Location: jawab_soalan.php");
?>
