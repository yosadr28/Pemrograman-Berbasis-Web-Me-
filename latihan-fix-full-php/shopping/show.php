<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Passing Data </title>
</head>

<body>
    <main>
        <div class="container-xl">
            <div class="container-xl py-5 text-center bg-info">
                <h1 style="color: white; text-shadow: 0.03em 0.03em rgb(146, 146, 146);
                    font-weight: 530; text-transform: uppercase; ">
                    RINCIAN PRODUCT</h1>
            </div>

            <?php
            $device = $_GET['device'];
            $name = $_GET['name'];
            $price = $_GET['store'];
            $image = $_GET['image'];
            $status;
            $Ket = '';
            $deskripsi = $_GET['teks'];
            if ($device === 'processor') {
                $status = $_GET['cores'];
                $Ket = 'Cores : ';
            } else if ($device === 'ram' || $device === 'vga') {
                $status = $_GET['size'];
                $Ket = 'Size : ';
            } else {
                $status = $_GET['type'];
                $Ket = 'Type : ';
            }
            ?>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img style="font-size=0.4em;" src=<?= $image ?>>
                        </div>
                    </div>
                    <div class="col-8 py">
                        <div class="card" style="font-size:0.2em;">
                            <div class="container-xl m-3 p-4">
                                <h2>Merek : <span class="badge bg-primary"><?= $name ?></span></h2>
                                <h2>Harga : <span class="badge bg-primary price"><?= $price ?></span></h2>
                                <h2><?php echo $Ket ?> <span class="badge bg-primary"><?= $status ?></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-xl my-4">
                    <h5 style="text-align: justify;">
                        <?php echo $deskripsi ?>
                    </h5>
                </div>

            </div>
        </div>
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© Yosef Adrian 2020130002</p>
    </footer>
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