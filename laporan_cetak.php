<html>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">

<!-- Table Headers -->        
<body>
    <table>
        <tr>
            <th>Bil</th>
            <th>IDPelajar</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tarikh</th>
            <th>Peratus</th>
        </tr>
<?php
    include_once ('sambungan.php');
    $pilihan=$_POST["pilihan"];
        $idkelas=$_POST["IDKelas"];
        $peratus=$_POST["Peratus"];
    $sql="select * from kuiz
        join pelajar on kuiz.IDPelajar=pelajar.IDPelajar
        join kelas on pelajar.IDKelas=kelas.IDKelas group by kuiz.IDPelajar ";
    // Drop Down Menu yang Membenarkan Pengguna Memilih Medan
    switch ($pilihan){
        case 1: $syarat="";
            $tajuk="PENCAPAIAN KESELURUHAN"; break;
        case 2: $syarat="having kelas.IDKelas='$idkelas'";
            $tajuk="PENCAPAIAN MENGIKUT KELAS"; break;
        case 3:
            if ($peratus==80){
                $syarat="having Peratus >= 80";
                $tajuk="PENCAPAIAN LEBIH DARIPADA 80%";
            }
            else if ($peratus==50){
                $syarat="having Peratus >= 50 AND Peratus <80";
                $tajuk="PENCAPAIAN LEBIH DARIPADA 50%";
            }
            else if ($peratus==0){
                $syarat="having Peratus < 50";
                $tajuk="PENCAPAIAN KURANG DARIPADA 50%";
            }
            break;
        case 4: 
            if ($peratus==80){
                $syarat="having Peratus >= 80 and kelas.IDKelas ='$idkelas' ";
                $tajuk="PENCAPAIAN MENGIKUT KELAS DAN LEBIH 80%";
            }
            else if ($peratus==50){
                $syarat="having Peratus >= 50 AND Peratus<80 and kelas.IDKelas = '$idkelas' ";
                $tajuk="PENCAPAIAN MENGIKUT KELAS DAN LEBIH 50%";
            }
            else if ($peratus==0){
                $syarat="having Peratus < 50 and kelas.IDKelas = '$idkelas' ";
                $tajuk="PENCAPAIAN MENGIKUT KELAS DAN KURANG 50%";
            }
            break;
    }
    $bil=1;
    $sql=$sql.$syarat; //cantum
    //echo $sql;
        
    $data=mysqli_query($sambungan,$sql);
        while ($kuiz=mysqli_fetch_array($data)){
    ?>
    <!-- Memaparkan IDPelajar, NamaPelajar, NamaKelas, Tarikh dan Peratus dalam Setiap Query -->
        <tr>
            <td><?php echo $bil; ?></td>
            <td><?php echo $kuiz['IDPelajar']; ?></td>
            <td><?php echo $kuiz['NamaPelajar']; ?></td>
            <td><?php echo $kuiz['NamaKelas']; ?></td>
            <td><?php echo $kuiz['Tarikh']; ?></td>
            <td><?php echo $kuiz['Peratus']; ?></td>
        </tr>
        
        <?php
            $bil=$bil+1;
        } //tamat while
        ?>
        <caption><?php echo $tajuk ; ?></caption>
        </table>
        <button class="cetak" onclick="window.print()">Cetak</button>
</body>
</html>