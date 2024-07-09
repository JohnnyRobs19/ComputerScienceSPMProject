<?php
    include ('sambungan.php');
?>
<link rel="stylesheet" href="senarai.css">

<form method="get">
<label class="hola">ID Pelajar </label>
<input type="text" id="b-query" name="idpelajar" placeholder="Masukkan Nombor IC">
<button type="submit">Cari</button>
</form>
   
   <table>
    <caption>SENARAI NAMA PELAJAR</caption>
    <tr>
        <th>IDPelajar</th>
        <th>NamaPelajar</th>
        <th>IDKelas</th>
    </tr>
    
    <?php
        $sql='select * from pelajar';
        if (isset($_GET['idpelajar'])){
            $idpelajar=$_GET['idpelajar'];
            if (strlen($idpelajar)>0){
                 $sql="select * from pelajar where IDPelajar='$idpelajar'";
            }        
        }
    
        $result=mysqli_query($sambungan, $sql);
        while ($pelajar=mysqli_fetch_array($result)){
            echo '<tr> <td>'.$pelajar["IDPelajar"].'</td>
                <td>'.$pelajar["NamaPelajar"].'</td>
                <td>'.$pelajar["IDKelas"].'</td>
            </tr>';
        }
    ?>
</table>
        