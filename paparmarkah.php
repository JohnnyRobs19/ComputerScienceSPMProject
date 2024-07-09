<?php
    $nama = $_POST["nama"];
    $markah = $_POST["markah"];
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
        <td class="label">Markah </td>
        <td class="output"><?php echo $markah; ?> </td>
    </tr>
    <tr>  
       <td class="label">Keputusan</td>      
       <td class="output"> <?php
            if ($markah > 50)
                echo "Lulus";
            else                
                echo "Gagal";
            ?>      
    </td>
    </tr>
   </table>
   <button class="keluar" type="button" onclick="window.location ='menu.html'">Kembali</button>
</form>

