<?php require_once('data.php'); ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>BT Peripherals</title>

  <style>
    .card>img {
      object-fit: cover;
      object-position: center;
      height: 240px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h1>BT Peripherals</h1>

    <form action="confirm.php" method="post">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-5">
        <?php
        foreach ($products as $product) : ?>
          <div class="col mb-3">
            <div class="card">
              <img src="<?= $product->getImage() ?>" class="card-img-top img-fluid">
              <div class="card-body">
                <h5 class="card-title"><?= $product->getName() ?></h5>
                <h6 class="card-subtitle text-muted price"><?= $product->getPriceVAT() ?></h6>
              </div>
              <div class="card-footer">
                <input type="text" value="0" name="<?= $product->getName() ?>" class="form-control" placeholder="Quantity">
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <button type="submit" class="btn btn-primary">Order</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    const formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'IDR'
    });

    const elements = document.querySelectorAll('.price');

    [...elements].forEach((element) => {
      element.innerHTML = formatter.format(element.innerHTML);
    });
  </script>
</body>

</html>