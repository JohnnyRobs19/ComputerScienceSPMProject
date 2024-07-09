<?php
    include ('sambungan.php');
?>
<link rel="stylesheet" href="senarai.css">

<table> 
    <caption>SENARAI NAMA GURU</caption>
    <tr> 
        <th>IDGuru</th>
        <th>NamaGuru</th>
    </tr>
    
    <?php
        $sql='select * from guru';
        $result=mysqli_query($sambungan,$sql);
        while ($guru=mysqli_fetch_array($result)){
            echo'<tr><td>'.$guru["IDGuru"].'</td>
                <td>'.$guru["NamaGuru"].'</td>
            </tr>';
        }
    ?>
</table>