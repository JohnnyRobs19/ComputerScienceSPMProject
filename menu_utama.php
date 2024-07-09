<?php
session_start();
$status=$_SESSION['status'];
$nama=$_SESSION['nama'];

echo "
<link rel='stylesheet' href='menu.css'>
<div>
<h3>MENU UTAMA</h3>
<h3>$nama</h3>
";

if ($status=="guru")
echo ' 
    <ul>
        <li><a href="home.html" target=kandungan>Laman Utama</a></li>
        <li><a href="menu_guru.html" target=menu>Guru</a></li>
        <li><a href="menu_pelajar.html" target=menu>Pelajar</a></li>
        <li><a href="menu_kelas.html" target=menu>Kelas</a></li>
        <li><a href="menu_soalan.html"
        target=menu>Soalan</a></li>
        <li><a href="laporan_pilihan.php"
        target=kandungan>Prestasi Murid</a></li>
        <li><a href="import.html"
        target=kandungan>Import</a></li>
        <li><a href="logout.php" target="_top">Keluar</a></li>
    </ul>
    </div> ';
else
    echo '
    <ul>
        <li><a href="home.html" target=kandungan>Laman Utama</a></li>
        <li><a href="jawab_mula.php" target=kandungan>Kuiz</a></li>
        <li><a href="logout.php" target="_top">Log Keluar</a><li>
    </ul>
    </div> ';
?>