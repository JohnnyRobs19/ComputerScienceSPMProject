<?php
    include ('sambungan.php');
?>
<link rel="stylesheet" href="senarai.css">

<table>
    <caption> SENARAI NAMA KELAS </caption>
    <tr>
        <th>ID Kelas</th>
        <th>NamaKelas</th>
    </tr>
    
    <?php
        $sql='select * from kelas';
        //echo $sql;
        $result=mysqli_query($sambungan, $sql);
        while ($kelas=mysqli_fetch_array($result)){
            echo '<tr><td>'.$kelas["IDKelas"].'</td>
            <td>'.$kelas["NamaKelas"].'</td>
            </tr>';
        }
    ?>
</table>