<?php

$nama = $_POST['nama'] ?? '-'; //Null Coallace klo datanya kosong digantiin sama - 
$gender = $_POST['gender'] ?? '-';

echo $nama . "<br>";
echo $gender . "<br>";
