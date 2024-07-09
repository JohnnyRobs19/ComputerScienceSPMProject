<?php
    include('sambungan.php');
    if (session_status()==PHP_SESSION_NONE){
        session_start();
    }
?>
<link rel="stylesheet" href="senarai.css">

<table>
    <caption>SKEMA DAN KEPUTUSAN</caption>
    <tr>
        <th>Bil</th>
        <th>Soalan</th>
        <th>Skema</th>
    </tr>
    <?php
        $jumlah=0;
        $betul=0;
        $idpelajar=$_SESSION['username'];
    $sql="select * from kuiz join soalan on kuiz.IDSoalan=soalan.IDSoalan where IDPelajar='".$idpelajar."'";
    $data=mysqli_query($sambungan,$sql);
        $bil=1;
        while ($kuiz=mysqli_fetch_array($data)){
            ?>
        <tr>
            <td class="bil"><?php echo $bil; ?></td>
            <td class="soalan">
            
                <?php 
                echo $kuiz['NamaSoalan']."<br>";
                echo "A.".$kuiz['PilihanA']."<br>";
                echo "B.".$kuiz['PilihanB']."<br>";
                echo "C.".$kuiz['PilihanC']."<br>";
                ?>
            </td>
            <td class="skema">
                <?php
                    echo "Jawapannya: ".$kuiz['Jawapan']."<br>";
                    echo "Anda pilih ".$kuiz['Pilih']."<br>";
                    if ($kuiz['Pilih']==$kuiz['Jawapan']){
                        echo "<img src='betul.png'>";
                        $betul=$betul+1;
                    }
                    else 
                        echo "<img src='delete.png'>";
            ?>
            </td>
    </tr>
    <?php 
            $bil=$bil+1;
            $jumlah=$jumlah+1;
        }
    ?>
</table>
<?php
    $peratus=$betul/$jumlah*100;
    $salah=$jumlah-$betul;
$sql="update kuiz set Peratus=$peratus where IDPelajar='".$idpelajar."'";
$data=mysqli_query($sambungan,$sql);
?>

<table>
    <caption>KEPUTUSAN PRESTASI INDIVIDU</caption>
    <tr>
        <th class="keputusan">Perkara</th>
        <th class="keputusan">Bilangan/Peratus</th>
    </tr>
    <tr>
        <th class="keputusan">Bilangan yang betul</th>
        <th class="keputusan"><?php echo $betul ?></th>
    </tr>
    <tr>
        <th class="keputusan">Bilangan yang salah</th>
        <th class="keputusan"><?php echo $salah ?></th>
    </tr>
    <tr>
        <th class="keputusan">Jumlah soalan</th>
        <th class="keputusan"><?php echo $jumlah ?></th>
    </tr>
    <tr>
        <th class="keputusan">Keputusan</th>
        <th class="keputusan"><?php echo number_format($peratus,0) ?></th>
    </tr>
</table>

        