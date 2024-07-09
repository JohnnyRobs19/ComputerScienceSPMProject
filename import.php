<?php
include ('sambungan.php');
$namajadual=$_POST ['namatable'];
$namafail=$_FILES['namafail']['name'];
$fail=fopen($namafail,"r");
$sql=""; 
$berjaya=FALSE;
while (!feof($fail)){
    $medan=explode(",", fgets($fail));
    
    if ($namajadual=="pelajar"){
        $idpelajar=$medan[0];
        $namapelajar=$medan[1];
        $idkelas=$medan[2];
        $password_pelajar=$medan[3];
        $sql="insert into pelajar values('$idpelajar','$namapelajar', '$idkelas', '$password_pelajar')";
        echo $sql;
        if (mysqli_query($sambungan, $sql)){
            $berjaya=true;
        }
        else{
            echo "Ralat: $sql<br>".mysqli_error($sambungan);
        }     
    }
    
    if ($namajadual=="soalan"){
        $idsoalan=$medan[0];
        $namasoalan=$medan[1];
        $pilihana=$medan[2];
        $pilihanb=$medan[3];
        $pilihanc=$medan[4];
        $jawapan=$medan[5];
        $idguru=$medan[6];
        $sql="insert into soalan values('$idsoalan','$namasoalan','$pilihana','$pilihanb','$pilihanc','$jawapan','$idguru')";
        if (mysqli_query($sambungan, $sql)){
            $berjaya=true;
        }
        else{
            echo "Ralat: $sql<br>".mysqli_error($sambungan);
        }   
    }
    if ($berjaya==true){
        echo "<script>alert('Rekod berjaya diimport')</script>";
    }

    else{
        echo "Ralat: $sql<br>".mysqli_error($sambungan);
    }
    
    if ($namajadual=="guru"){
        $idguru=$medan[0];
        $namaguru=$medan[1];
        $password_guru=$medan[2];
        $sql="insert into guru values('$idguru','$namaguru', '$password_guru')";
        echo $sql;
        if (mysqli_query($sambungan, $sql)){
            $berjaya=true;
        }
        else{
            echo "Ralat: $sql<br>".mysqli_error($sambungan);
        }     
    }
    
    if ($namajadual=="kelas"){
        $idkelas=$medan[0];
        $namakelas=$medan[1];
        $sql="insert into kelas values('$idkelas','$namakelas')";
        echo $sql;
        $sqlconnection=mysqli_query($sambungan, $sql);
        
        if ($sqlconnection){
            $berjaya=true;
        }
        
        else{
            echo "Ralat: $sqlconnection , $sql<br>".mysqli_error($sambungan);
        }     
    }
}
?>