<?php
    include ('sambungan.php');
?>
<link rel="stylesheet" href="senarai.css">

<form method="get">
<label class="hola">ID Guru </label>
<input type="text" id="b-query" name="idguru" placeholder="Masukkan Nombor IC">
<button type="submit">Cari</button>
</form>
<table>
    <caption>SENARAI NAMA GURU</caption>
    <tr> 
        <th>IDGuru</th>
        <th>NamaGuru</th>
    </tr>
    
    <?php
        $sql='select * from guru';
        if (isset($_GET['idguru'])){
            $idguru=$_GET['idguru'];
            if (strlen($idguru)>0){
                 $sql="select * from guru where IDGuru='$idguru'";
            }        
        }
    
        $result=mysqli_query($sambungan,$sql);
        while ($guru=mysqli_fetch_array($result)){
            echo'<tr><td>'.$guru["IDGuru"].'</td>
                <td>'.$guru["NamaGuru"].'</td>
            </tr>';
        }
    ?>
</table>