<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body>
    <h3>PILIHAN JENIS LAPORAN </h3>
    <form action="laporan_cetak.php" method="post">
    <select id='pilihan' name='pilihan' onchange='papar_pilihan()'>
        <option value=1>Semua Kelas dan Peratus</option>
        <option value=2>Mengikut Kelas</option>
        <option value=3>Mengikut Peratus</option>
        <option value=4>Mengikut Kelas dan Peratus</option>
    </select><br>
        
    <!--Drop Down Menu yang Memaparkan Nama Kelas -->
    <div id="NamaKelas" style="display: none;">
        <select name="IDKelas">
        <?php
            include ('sambungan.php');
            $sql="select * from kelas";
            $data=mysqli_query($sambungan,$sql);
            while ($kelas=mysqli_fetch_array($data)){
                echo "<option value='$kelas[IDKelas]'>$kelas[NamaKelas]</option>";
            }
        ?>
        </select>
    </div>
        
    <!-- Drop Down Menu yang Memaparkan Julat Markah -->
    <div id="Peratus" style="display: none;">
        <select name="Peratus">
            <option value=80>Lebih 80</option>
            <option value=50>Lebih 50</option>
            <option value=0>Kurang 50</option>
        </select>  
    </div>
    <button class="papar" type="submit">Papar</button>
</form>
<!--Medan Kelas dan Peratus yang akan dipaparkan sekiranya diarahkan-->
   <script>
    function papar_pilihan(){
        var pilih=document.getElementById('pilihan').value;
        var paparKelas='none';
        var paparPeratus='none';
        if (pilih==2){
            paparKelas='block';
            //paparPeratus='none';
        }
        else if (pilih==3){
            //paparKelas='none';
            paparPeratus='block';
        }
        else if (pilih==4){
            paparKelas='block';
            paparPeratus='block';
        }
        document.getElementById('NamaKelas').style.display=paparKelas;
        document.getElementById('Peratus').style.display=paparPeratus;
    }
</script>
</body>
</html>