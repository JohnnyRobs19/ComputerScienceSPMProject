<?php
include ('sambungan.php');
$namajadual=$_POST ['namatable'];
$namafail=$_FILES['namafail']['name'];
// untuk membuka fail teks untuk dibaca sahaja
$fail=fopen($namafail,"r");
$sql=""; 
$berjaya=FALSE;
while (!feof($fail)){
    // Kegunaan Tanda Koma untuk Membezakan Setiap Atribut
    $medan=explode(",", fgets($fail));
    
    // Pengguna perlu Mengikut Urutan Atribut Jadual pelajar
    if ($namajadual=="pelajar"){
        $idpelajar=$medan[0];
        $namapelajar=$medan[1];
        $idkelas=$medan[2];
        $password_pelajar=$medan[3];
        $sql="insert into pelajar values('$idpelajar','$namapelajar', '$idkelas', '$password_pelajar')";
        //echo $sql;
        $sqlconnection=mysqli_query($sambungan, $sql);
        
        if ($sqlconnection){
            $berjaya=true;
        }
        
        else{
            echo "Ralat: sqlconnection $sqlconnection , $sql<br>".mysqli_error($sambungan);
        }     
    }
    
    // Pengguna perlu Mengikut Urutan Atribut Jadual soalan
    if ($namajadual=="soalan"){
        $idsoalan=$medan[0];
        $namasoalan=$medan[1];
        $pilihana=$medan[2];
        $pilihanb=$medan[3];
        $pilihanc=$medan[4];
        $jawapan=$medan[5];
        $idguru=$medan[6];
        $sql="insert into soalan values('$idsoalan','$namasoalan','$pilihana','$pilihanb','$pilihanc','$jawapan','$idguru')";
        $sqlconnection=mysqli_query($sambungan, $sql);
        
        if ($sqlconnection){
            $berjaya=true;
        }
        
        else{
            echo "Ralat: sqlconnection $sqlconnection , $sql<br>".mysqli_error($sambungan);
        } 
    }
    
    // Pengguna perlu Mengikut Urutan Atribut Jadual guru
    if ($namajadual=="guru"){
        $idguru=$medan[0];
        $namaguru=$medan[1];
        $password_guru=$medan[2];
        $sql="insert into guru values('$idguru','$namaguru', '$password_guru')";
        //echo $sql;
        $sqlconnection=mysqli_query($sambungan, $sql);
        
        if ($sqlconnection){
            $berjaya=true;
        }
        
        else{
            echo "Ralat: sqlconnection $sqlconnection , $sql<br>".mysqli_error($sambungan);
        }  
    }
    
    // Pengguna perlu Mengikut Urutan Atribut Jadual kelas
    if ($namajadual=="kelas"){
        $idkelas=$medan[0];
        $namakelas=$medan[1];
        $sql="insert into kelas values('$idkelas','$namakelas')";
        $sqlconnection=mysqli_query($sambungan, $sql);
        
        if ($sqlconnection){
            $berjaya=true;
        }
        
        else{
            echo "Ralat: sqlconnection $sqlconnection , $sql<br>".mysqli_error($sambungan);
        }     
    }
    if ($berjaya==true){
        echo "<script> if (confirm('Rekod Berjaya Diimport')) document.location='import.html';</script>";
    }

    else{
        echo "Ralat: sqlconnection $sqlconnection<br> sql $sql".mysqli_error($sambungan);
    }
}
?>