<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "Judul"?></title>
        <meta charset = "UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <form>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukkan Bilangan A</label>
    <input type="number" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <label for="exampleInputEmail1" class="form-label">Masukkan Bilangan B</label>
    <input type="number" name='name2' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
$nama = 'Ujang' ;
echo $nama;
?>
<br>
<strong> <?php
$gaji = 10000 ;
echo $gaji * 1.1 ;
?> <strong>

<?php
//aplikasi dasar matematika
$a = 0 ; $b = 0 ;
echo $a++ . '<br>' ;
echo $a-- . '<br>' ;
$b = $a * 2 ;
echo $b . '<br>' ;
//cara ngeprint variabel
echo 'hasil' . $a .'tutup';
echo "abc $a def";
?>

<?php
echo '<h1 style="float:left;">JUDUL</h1>';
$nilai1 = $_GET['name']; $nilai2 = $_GET['name'];
echo '<div class="container">  nilai 
</div>';
echo $nilai1 - $nilai2;;
echo $nilai1 / $nilai2;
echo $nilai1 * $nilai2;;
echo $nilai1 % $nilai2;
?>

<?php
//else if php
$nilai = 75 ;
if ($nilai >= 60 ) {
echo "<h2>Lulus</h2>" ;
} elseif ($nilai >= 50 ) {
echo "<h3>Ikut perbaikan</h3>" ;
} else {
echo "<h4>Tidak Lulus</h4>" ;
}?>

<?php
//conditional comparator php, nilai true =1 ||| false =null(kosong)
echo "FALSE: " . ($nilai > 100 ) . "<br>" ;
echo "FALSE: " . ($nilai == 100 ) . "<br>" ;
echo "TRUE: " . ($nilai > 50 && $nilai <= 100 ) . "<br>" ;
echo "FALSE: " . ($nilai <= 50 || $nilai > 100 ). "<br>";
?>

<?php
//SWITCH PHP
$opsi = 'C' ;
switch ($opsi) {
case 'A' :
echo "Pilihan 1" . "<br>" ;
break ;
case 'B' :
echo "Pilihan 2" . "<br>" ;
break ;
default :
echo "Pilihan invalid!"."<br>" ;
}
echo "Pilihan invalid!";
echo "Pilihan invalid!";
echo "Pilihan invalid!";?>

<?php
//Array dalam PHP
$array = [ 1 , true , false , 4.5 , 5 ,'ERP'];//asosiatif array (kumpulan gabungan array)
echo $array[ 0 ] . "<br>" ;
echo $array[ 3 ] . "<br>" ;
$array[] = 100 ;
$array[] = 25 ;
//$array[ 2 ] = 40 ; // index 2 dig//anti
print_r($array) ; // coba ganti menjadi print_r($array);
for($i=0;$i<count($array);$i++){
    echo $array[$i];
}
print_r("TEST") ;
?>
<?php
//function array asosiatif
$soal = array (
'soal' => 'Jawab ini.' ,
'pilihan' => array (
'pil1' => 'Satu' ,
'pil2' => 'Dua' ,
'pil3' => 'Tiga' ,
'pil4' => 'Empat' ,
)
);
?>
<ol>
<li>
<?= $soal[ 'soal' ] ?>
<ol type= "a" >
<li> <?= $soal[ 'pilihan' ][ 'pil1' ] ?> </li>
<li> <?= $soal[ 'pilihan' ][ 'pil2' ] ?> </li>
<li> <?= $soal[ 'pilihan' ][ 'pil3' ] ?> </li>
<li> <?= $soal[ 'pilihan' ][ 'pil4' ] ?> </li>
</ol>
</li>
</ol>

<?php
//loop
for ($i = 0 ; $i < 10 ; $i++) {
echo "$i<br>" ;
}?>

<ol>
<li>
<?= $soal[ 'soal' ] ?>
<?php
$arr = [1,2,3,4,5,6];
?>
<ol type= "a" >
    <?php
    foreach($arr as $num) : ?>
        <li><?= $num ?></li>
        <?php endforeach ?>
</ol>
</li>
</ol>

<?php
//break (untuk menghentikan) dan continue (untuk melanjutkan)
for ($i = 0 ; $i < 10 ; $i++) {
if ($i % 2 == 0 ) continue ;
if ($i > 6 ) break ;
echo "$i<br>" ;
}?>

<?php
//spawn array ke value normal
$array = [ 1 , 3 , 5 , 7 , 9 , 11 ];
foreach ($array as $angka) {
echo "$angka<br>" ;
}?>

<?php
//function PHP
function doubleWage ($wage) {
return $wage * 2 ;
}
echo doubleWage( 500000 );
//sisanya baca2 di w3school
?>

    </body>
</html>