<?php 
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pesanan";
    
    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    die('KONEKSI DATABASE BERMASALAH!!!');
}


// function refr() {

// }

?>