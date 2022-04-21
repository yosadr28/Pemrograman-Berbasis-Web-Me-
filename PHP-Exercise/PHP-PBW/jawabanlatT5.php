<?php
//Nama : Yosef Adrian
//NPM : 2020130002
$arr = array(
    array(
    'kode' => 'A1',
    'kuliah' => 'Kalkulus',
    'sks' => 4
  ),
  array(
    'kode' => 'A1',
    'kuliah' => 'Kalkulus',
    'sks' => 4
  ),
    array(
    'kode' => 'C7',
    'kuliah' => 'Matematika Diskrit',
    'sks' => 2
  ),
    array(
    'kode' => 'B3',
    'sks' => 2
  ),
    array(
    'kode' => 'E6',
    'kuliah' => 'Logika',
    'sks' => 2
  ),
  array(
    'kode' => 'A1',
    'kuliah' => 'Kalkulus',
    'sks' => 4
  ),
    array(
    'kode' => 'C7',
    'kuliah' => 'Matematika Diskrit',
    'sks' => 2
  ),
    array(
    'kode' => 'B3',
    'kuliah' => 'Etika',
    'sks' => 2
  ),
    array(
    'kode' => 'E6',
    'kuliah' => 'Logika',
    'sks' => 0
  )
);
?>
<!doctype html>
<html>
<head>
  <title>Latihan PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Import Bootstrap CSS di sini -->
</head>
<body>
  <div class="container mt-5">
    <div class="table-responsive-lg">
      <table class="table table-striped table-hover">
      <thead class="table-dark">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Kode</th>
        <th scope="col">Mata Kuliah</th>
        <th scope="col">SKS</th>
      </tr>
      </thead>
      <tbody>
      <?php
        $i=1;
        foreach($arr as $isi) :?>
          <tr scope="row"><td><?=$i?></td>
          <td><?= $isi['kode'] ?></td>
          <td><?= $isi['kuliah'] ?></td>
          <td><?= $isi['sks'] ?></td>
          </tr>
        <?php  $i++; endforeach ?>
      </tbody>
    </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Import Bootstrap JS di sini -->
</body>
</html>