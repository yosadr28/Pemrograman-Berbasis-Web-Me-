<?php require_once('data.php'); ?>

<!DOCTYPE html>

<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Order | BT Peripherals</title>
</head>

<body>
  <div class="container mt-5">
    <h2>Cart</h2>

    <?php

    $totalPayment = 0;

    foreach ($products as $product) :
      $orderCount = $_POST[$product->getName()];
      $product->setOrderCount($orderCount);

      $totalPayment += $product->getTotalPrice();
    ?>
      <p>
        <?= $product->getName() ?> x <?= $orderCount ?>
      </p>
      <p class="price">
        <?= $product->getTotalPrice() ?>
      </p>
    <?php endforeach ?>

    <h3>Total Price: <span class="price"><?= $totalPayment ?></span></h3>
  </div>

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