<?php

$array = [1, 2, 3, 4, 5];
echo $array[0] . "<br>";
echo $array[3] . "<br>";

$array[] = 100;
$array[] = 25;
$array[2] = 40;

print_r($array);

?>
<br>
<?php

$soal = array(
  'soal' => 'Jawab ini.',
  'pilihan' => array(
    'pil1' => 'Satu',
    'pil2' => 'Dua',
    'pil3' => 'Tiga',
    'pil4' => 'Empat',
  )
);
?>

<ol>
  <li>
    <?= $soal['soal'] ?>
    <ol type="a">
      <li><?= $soal['pilihan']['pil1'] ?></li>
      <li><?= $soal['pilihan']['pil2'] ?></li>
      <li><?= $soal['pilihan']['pil3'] ?></li>
      <li><?= $soal['pilihan']['pil4'] ?></li>
    </ol>
  </li>
</ol>