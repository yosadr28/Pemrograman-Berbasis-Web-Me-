<?php
for ($i = 0; $i < 10; $i++) {
  echo "$i<br>";
}

$i = 0;
while ($i < 10) {
  echo "$i<br>";
  $i++;
}

$j = 0;
do {
  echo "$j<br>";
  $j++;
} while ($j < 10);

for ($i = 0; $i < 10; $i++) {
  if ($i % 2 == 0) continue;
  if ($i > 6) break;
  echo "$i<br>";
}

$array = [1, 3, 5, 7, 9, 11];
foreach ($array as $angka) {
  echo "$angka<br>";
}
