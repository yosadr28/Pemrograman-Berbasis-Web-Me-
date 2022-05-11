<?php require_once('data.php'); ?>
<?php
require_once('models/product.php');
?>
<?php
require_once('data.php');
require_once('models/product.php');
$products = getAllProducts();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> BT Peripherals </title>
    <div class="d-flex flex-row">
        <div class="flex-fill">
            <h1>BT Peripherals</h1>
            <h4>Products count: <?= Product::getCount() ?></h4>
        </div>
        <div class="justify-content-end align-self-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Add
                Product</button>
        </div>
    </div>
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
        <h1> BT Peripherals </h1>
        <h3>Item count: <?= Product::getCount() ?></h3>
        <form action="confirm.php" method="post">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-5">
                <?php
                foreach ($products as $product) : ?>
                    <div class="col mb-3">
                        <div class="card">
                            <img src="<?= $product->getImage() ?>" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="show2.php?id=<?= $product->getId() ?>">
                                        <!-- <a href="show.php?name=<?= $product->getName() ?>&id=?id=<?= $product->getId() ?>&store=<?= $product->getPriceVAT()
                                                                                                                                        ?>&image=<?= $product->getImage() ?>
<?php if ($product instanceof Processor) : ?>
&device=processor
&cores=<?= $product->getCores() ?>
<?php endif ?>
<?php if ($product instanceof VGA) : ?>
    &device=vga
&size=<?= $product->getSize() ?>
<?php endif ?>
<?php if ($product instanceof RAM) : ?>
    &device=ram
&size=<?= $product->getSize() ?>
<?php endif ?>
<?php if ($product instanceof Storage) : ?>
    &device=storage
&type=<?= $product->getType() ?>
<?php endif ?>&teks=<?= $product->getTeks() ?>">--><?= $product->getName() ?>
                                    </a>
                                </h5>
                                <h6 class="card-subtitle text-muted price"> <?= $product->getPriceVAT() ?> </h6>
                                <p>
                                    <?php if ($product instanceof Processor) : ?>
                                        <span class="badge bg-primary">
                                            <?= $product->getCores() ?> core(s)
                                        </span>
                                    <?php endif ?>
                                </p>
                                <p>
                                    <?php if ($product instanceof VGA) : ?>
                                        <span class="badge bg-primary">
                                            <?= $product->getSize() ?> core(s)
                                        </span>
                                    <?php endif ?>
                                </p>
                                <p>
                                    <?php if ($product instanceof RAM) : ?>
                                        <span class="badge bg-primary">
                                            <?= $product->getSize() ?> core(s)
                                        </span>
                                    <?php endif ?>
                                </p>
                                <p>
                                    <?php if ($product instanceof Storage) : ?>
                                        <span class="badge bg-danger">
                                            <?= $product->getType() ?> core(s)
                                        </span>
                                    <?php endif ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <input type="text" value="0" name="<?= $product->getName() ?>" class="form-control" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <button type="submit" class="btn btn-primary"> Order </button>
        </form>
        <!-- Add product modal -->
        <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Add new product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="controller.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="productName" placeholder="Product name" name="name" required>
                                <label for="productName" class="form-label">Product name</label>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="productPrice">Rp</span>
                                    <input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="productPrice" min="0" name="price" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="productImageUrl" class="form-label">Image URL</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="productImageUrl"><i class="fa fa-link"></i></span>
                                    <input type="text" class="form-control" placeholder="URL" aria-label="URL" aria-describedby="productImageUrl" name="imageUrl" required>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" aria-label="Category" id="productCategory" name="category" required>
                                    <option value="" selected>Choose a category</option>
                                    <option value="processor">Processor</option>
                                    <option value="storage">Storage</option>
                                    <option value="memory">Memory</option>
                                    <option value="vga">VGA</option>
                                </select>
                            </div>
                            <div class="mb-3" id="specific"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
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
        <script>
            function displaySpecificFields() {
                let category = document.getElementById('productCategory').value;
                let whereToPut = document.getElementById('specific');
                switch (category) {
                    case 'processor':
                        whereToPut.innerHTML = `
<label for="coreNumber" class="form-label">Cores</label>
<label for="coreNumber" class="form-label float-end" id="selectedCores"></label>
<input type="range" class="form-range" aria-label="Cores" aria-describedby="coreNumber" min="1"
max="32" name="cores" id="coreNumber" value="1" required>
`;
                        document.getElementById('coreNumber').addEventListener('mousemove', () => {
                            let value = document.getElementById('coreNumber').value;
                            document.getElementById('selectedCores').innerHTML = `${value} core${value > 1 ? 's' : ''}`;
                        });
                        break;
                    case 'storage':
                        whereToPut.innerHTML = `
<label for="storageType" class="form-label">Storage Type</label>
<div class="form-check">
<input class="form-check-input" type="radio" name="storageType" id="storageTypeHDD"
value="HDD" checked>
<label class="form-check-label" for="storageTypeHDD">
HDD
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="storageType" id="storageTypeSSD"
value="SSD">
<label class="form-check-label" for="storageTypeSSD">
SSD
</label>
</div>
`;
                        break;
                    case 'vga':
                    case 'memory':
                        whereToPut.innerHTML = `
<label for="componentSize" class="form-label">Size</label>
<input type="text" class="form-control" id="componentSize" placeholder="Size" name="size"
required>
`;
                        break;
                    default:
                        whereToPut.innerHTML = '';
                }
            }
            document.getElementById('productCategory').addEventListener('change', displaySpecificFields);
        </script>
</body>

</html>