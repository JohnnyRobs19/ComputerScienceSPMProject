<?php
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $luas = $panjang * $lebar
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3>OUTPUT</h3>   
<form>
   <table>
    <tr>
        <td class="label">Panjang </td>
        <td class="output"><?php echo $panjang; ?> </td>
    </tr>
    <tr>
        <td class="label">Lebar </td>
        <td class="output"><?php echo $lebar; ?> </td>
    </tr>
    <tr>  
       <td class="label">Luas</td>      
       <td class="output"><?php echo $luas; ?>  </td>
    </tr>
   </table>
   <button class="keluar" type="button" onclick="window.location ='menu.html'">Kembali</button>
</form>

