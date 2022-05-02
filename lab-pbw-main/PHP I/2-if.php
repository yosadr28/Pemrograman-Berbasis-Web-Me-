<?php

$nilai = 75;

if ($nilai >= 60) {
  echo "<h2>Lulus</h2>";
} elseif ($nilai >= 50) {
  echo "<h3>Ikut perbaikan</h3> ";
} else {
  echo "<h4>Tidak Lulus</h4>";
}

?>
<br>
<?php

echo "FALSE: " . ($nilai > 100) . "<br>";
echo "FALSE: " . ($nilai == 100) . "<br>";
echo "TRUE: " . ($nilai > 50 && $nilai <= 100) . "<br>";
echo "FALSE: " . ($nilai <= 50 || $nilai > 100);

?>
<br>
<?php

$opsi = 'A';

switch ($opsi) {
  case 'A':
    echo "Pilihan 1";
    break;
  case 'B':
    echo "Pilihan 2";
    break;
  default:
    echo "Pilihan invalid!";
}
