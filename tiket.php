<?php
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3>OUTPUT</h3>   
<form>
   <table>
   <tr>
        <td class="label">Nama </td>
        <td class="output"><?php echo $nama; ?> </td>
   </tr>
    <tr>
        <td class="label">Umur /td>
        <td class="output"><?php echo $umur; ?> </td>
    </tr>
   <tr>  
       <td class="label">Keputusan</td>     
       <td class="output"> <?php
            if ($umur < 12)
                echo "RM15";
            else                
                echo "RM18";
            ?>      
    </td>
    </tr>
   </table>
   <button class="keluar" type="button" onclick="window.location ='menu.html'>Kembali</button>
</form>

