<?php 
    include ('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI SOALAN</caption>
    <tr>
        <th>IDSOALAN</th>
        <th>NAMASOALAN</th>
        <th>PILIHANA</th>
        <th>PILIHANB</th>
        <th>PILIHANC</th>
        <th>JAWAPAN</th>
        <th>IDGuru</th>
    </tr>
    
    <?php
        $sql='select * from soalan';
        $result=mysqli_query($sambungan,$sql);
        while ($soalan=mysqli_fetch_array($result)){
            echo '<tr><td>'.$soalan["IDSoalan"].'</td>
                      <td>'.$soalan["NamaSoalan"].'</td>
                      <td>'.$soalan["PilihanA"].'</td>
                      <td>'.$soalan["PilihanB"].'</td>
                      <td>'.$soalan["PilihanC"].'</td>
                      <td>'.$soalan["Jawapan"].'</td>
                      <td>'.$soalan["IDGuru"].'</td>
            </tr>';
        }
    ?>
</table>
        
    