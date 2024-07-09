<?php
    $host='localhost';
    $user= 'root';
    $password= '';
    $database = 'KuizOnline';
    
    if (!function_exists("debug")){
     function debug($message) {
        echo"<p class='debug'>$message</p>";
        error_log($message, 0);   
    }
}

    $sambungan=mysqli_connect($host, $user, $password, $database)
    or die ('Sambungan gagal');
    debug('Sambungan berjaya!');
    // echo '<p class="debug"> Sambungan berjaya </p>';
?>