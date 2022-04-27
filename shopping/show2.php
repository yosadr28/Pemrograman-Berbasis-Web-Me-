<?php
require_once('data.php');
$product = getSingleProduct($_GET['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <title><?= $product->getName() ?> | BT Peripherals</title>
</head>

<body onload="displaySpecificFields()">
    <div class="container mt-5">
        <div class="d-flex flex-row">
            <div class="flex-fill">
                <h1><?= $product->getName() ?></h1>
            </div>
            <div class="justify-content-end align-self-center">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="switchEdit" onchange="toggleForm()">
                    <label class="form-check-label" for="switchEdit">Edit product information</label>
                </div>
                <div class="d-grid">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-5" id="productInfo">
        <div class="col-12 col-md-4">
            <img src="<?= $product->getImage() ?>" class="img-fluid">
        </div>
        <div class="col-12 col-md-8">
            <span class="h1 price">
                <?= $product->getPriceVAT() ?>
            </span>
            <p>
                <?php if ($product instanceof Processor) : ?>
                    <span class="badge bg-primary">
                        <?= $product->getCores() ?> core(s)
                    </span>
                <?php elseif ($product instanceof RAM) : ?>
                    <span class="badge bg-success">
                        <?= $product->getSize() ?>
                    </span>
                <?php elseif ($product instanceof Storage) : ?>
                    <span class="badge bg-danger">
                        <?= $product->getType() ?>
                    </span>
                <?php elseif ($product instanceof VGA) : ?>
                    <span class="badge bg-warning">
                        <?= $product->getSize() ?>
                    </span>
                <?php endif ?>
            </p>
        </div>
    </div>
    <div class="row mt-5" id="editForm" style="display: none;">
        <form action="controller.php" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $product->getId() ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="productName" placeholder="Product name" name="name" value="<?= $product->getName() ?>" required>
                <label for="productName" class="form-label">Product name</label>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text" id="productPrice">Rp</span>
                    <input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="productPrice" min="0" name="price" value="<?= $product->getPriceVAT() * 10 / 11 ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="productImageUrl" class="form-label">Image URL</label>
                <div class="input-group">
                    <span class="input-group-text" id="productImageUrl"><i class="fa fa-link"></i></span>
                    <input type="text" class="form-control" placeholder="URL" aria-label="URL" aria-describedby="productImageUrl" name="imageUrl" value="<?= $product->getImage() ?>" required>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select class="form-select" aria-label="Category" id="productCategory" name="category" required>
                    <option value="">Choose a category</option>
                    <option value="processor" <?= $product instanceof Processor ? 'selected' : ''
                                                ?>>Processor</option>
                    <option value="storage" <?= $product instanceof Storage ? 'selected' : '' ?>>Storage</option>
                    <option value="memory" <?= $product instanceof RAM ? 'selected' : '' ?>>Memory</option>
                    <option value="vga" <?= $product instanceof VGA ? 'selected' : '' ?>>VGA</option>
                </select>
            </div>
            <div class="mb-3" id="specific"></div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>

    <div class="modal fade" id="confirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Delete confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="controller.php" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $product->getId() ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
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
max="32" name="cores" id="coreNumber" value="<?= $product instanceof Processor ? $product->getCores() : 1
                                                ?>" required>
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
value="HDD" <?= $product instanceof Storage && $product->getType() == 'HDD' ? 'checked' : '' ?>>
<label class="form-check-label" for="storageTypeHDD">
HDD
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="storageType" id="storageTypeSSD"
value="SSD" <?= $product instanceof Storage && $product->getType() == 'SSD' ? 'checked' : '' ?>>
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
value="<?= ($product instanceof RAM || $product instanceof VGA) ? $product->getSize() : '' ?>" required>
`;
                    break;
                default:
                    whereToPut.innerHTML = '';
            }
        }
        document.getElementById('productCategory').addEventListener('change', displaySpecificFields);
    </script>
    <script>
        function toggleForm() {
            if (document.getElementById('switchEdit').checked) {
                document.getElementById('productInfo').setAttribute('style', 'display: none;');
                document.getElementById('editForm').removeAttribute('style');
            } else {
                document.getElementById('productInfo').removeAttribute('style');
                document.getElementById('editForm').setAttribute('style', 'display: none;');
            }
        }
    </script>
</body>

</html>