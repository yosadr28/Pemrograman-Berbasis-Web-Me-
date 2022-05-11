<?php require_once('matkul.php'); ?>
<?php require_once('matkuldt.php');
$matkul = getMatkul();
$isi = [];
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Perkuliahan Yosef </title>
</head>

<body>
    <div class="container mt-5">
        <h1>YOSEF'S PARTICATOR</h1>
        <hr>


        <div class="row mt-4">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h2>PERKULIAHAN YOSEF</h2>
                        <div class="card my-2">
                        <p>Mata Kuliah Ditempuh : <?= 
                        (count($matkul))?> Matkul</p>
                        <br>
                        <p> Total SKS Ditempuh : 
                    <?php
                    $totalsks = 0;
                    foreach ($matkul as $data) :
                    ?>
                        <?php $totalsks += $data->getSks() ?>
                    <?php endforeach ?>
                    <?php echo $totalsks; ?> SKS
                        </div></p>
                        <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width:<?= 
                        (count($matkul)/144) *100?>%;" aria-valuenow="<?= 
                        (count($matkul)/144) *100?>" aria-valuemin="0" aria-valuemax="100"><?= 
                        round((count($matkul)/144) *100,0)?>%</div>
                    </div>
                    </div>     
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-dark text-center" style="font-weight: 700; color: white; text-shadow: 0.04em 0.05em gray;">
                        My Status
                    </div>
                    <div class="card-body">
                        Ini status yosef
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="justify-content-end align-self-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMatkul">Tambah Data Kuliah</button>
            <input type="text" id="input" onkeyup="cariData()" placeholder="Cari Nama Matkul....">
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-3 list" id="data">
            <table class="table  table-striped table-hover table-dark text-center" id="table">
                <thead>
                    <tr class="table-info" style="vertical-align: middle;">
                        <th scope="col" rowspan="2">Kode MatKul</th>
                        <th scope="col" rowspan="2">Nama Matkul</th>
                        <th scope="col" colspan="3">Nilai</th>
                        <th scope="col" rowspan="2">SKS</th>
                        <th scope="col" rowspan="2">Semester</th>
                    </tr>
                    <tr class="table-warning" style="vertical-align: middle;">
                        <th scope="col">Tugas</th>
                        <th scope="col">UTS</th>
                        <th scope="col">UAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 2;
                    foreach ($matkul as $data) :
                    ?>
                        <tr>
                            <th scope="row"><?= $data->getKodeMatkul() ?></th>
                            <td><?= $data->getNamaMatkul() ?></td>
                            <td><?= $data->getTugas() ?></td>
                            <td><?= $data->getUts() ?></td>
                            <td><?= $data->getUas() ?></td>
                            <td><?= $data->getSks() ?></td>
                            <td><?php if ($data->getSemester() == 11) {
                                    echo "SP-1";
                                } else if ($data->getSemester() == 22) {
                                    echo "SP-2";
                                } else if ($data->getSemester() == 33) {
                                    echo "SP-3";
                                } else if ($data->getSemester() == 33) {
                                    echo "SP-4";
                                } else {
                                    echo $data->getSemester();
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editMatkul" onclick="getCellValue(<?= $i ?>)">
                                    <span class="material-symbols-outlined" style="text-align: center;">
                                        settings
                                    </span>
                                </button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete" onclick="setDeleteKode(<?= $i ?>)">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!--Tambah data Matkul-->
        <div class="modal fade" id="addMatkul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="controller.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <h3 style="text-transform:capitalize;">MATA KULIAH</h3>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="kodematkul" placeholder="Kode Matakuliah" name="kodematkul" required>
                                        <label for="kodematkul" class="form-label"><span class="text-muted">Kode MataKuliah</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="namamatkul" placeholder="Kode Matakuliah" name="namamatkul" required>
                                        <label for="namamatkul" class="form-label"><span class="text-muted">Nama MataKuliah</span></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 style="text-transform:capitalize;">Nilai</h3>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <label for="tugas" class="form-label">Tugas</label>
                                    <input type="number" class="form-control" aria-label="tugas" aria-describedby="tugas" name="tugas" step=".1" required>
                                </div>
                                <div class="col-4">
                                    <label for="uts" class="form-label">UTS</label>
                                    <input type="number" class="form-control" aria-label="uts" aria-describedby="uts" name="uts" step=".1" required>
                                </div>
                                <div class="col-4">
                                    <label for="uas" class="form-label">UAS</label>
                                    <input type="number" class="form-control" aria-label="uas" aria-describedby="uas" name="uas" step=".1" required>
                                </div>
                            </div>

                            <hr>
                            <h3 style="text-transform:capitalize;">Rincian</h3>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <label for="sks" class="form-label">SKS</label>
                                    <select class="form-select" aria-label="sks" id="sks" name="sks" required>
                                        <option value="" selected>Pilih Besar SKS</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" aria-label="semester" id="semester" name="semester" required>
                                        <option value="" selected>Pilih Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="11">SP-1</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="22">SP-2</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="33">SP-3</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--edit data Matkul-->
        <div class="modal fade" id="editMatkul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="controller.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <h3 style="text-transform:capitalize;">MATA KULIAH</h3>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="kodematkuledit" placeholder="Kode Matakuliah" name="kodematkul" value="" required>
                                        <label for="kodematkul" class="form-label"><span class="text-muted">Kode MataKuliah</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="namamatkuledit" placeholder="Nama Matakuliah" name="namamatkul" value="" required>
                                        <label for="namamatkul" class="form-label"><span class="text-muted">Nama MataKuliah</span></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 style="text-transform:capitalize;">Nilai</h3>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <label for="tugas" class="form-label">Tugas</label>
                                    <input type="number" class="form-control" aria-label="tugas" id="tugasedit" aria-describedby="tugas" name="tugas" value="" step=".1" required>
                                </div>
                                <div class="col-4">
                                    <label for="uts" class="form-label">UTS</label>
                                    <input type="number" class="form-control" aria-label="uts" id="utsedit" aria-describedby="uts" name="uts" value="" step=".1" required>
                                </div>
                                <div class="col-4">
                                    <label for="uas" class="form-label">UAS</label>
                                    <input type="number" class="form-control" aria-label="uas" id="uasedit" aria-describedby="uas" name="uas" value="" step=".1" required>
                                </div>
                            </div>

                            <hr>
                            <h3 style="text-transform:capitalize;">Rincian</h3>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <label for="sks" class="form-label">SKS</label>
                                    <select class="form-select" aria-label="sks" id="sksedit" name="sks" required>
                                        <option value="" selected>Pilih Besar SKS</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" aria-label="semester" id="semesteredit" name="semester" required>
                                        <option value="" selected>Pilih Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="11">SP-1</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="22">SP-2</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="33">SP-3</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Data Matkul -->
        <div class="modal fade" id="confirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel">Delete confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Hapus Data Mata Kuliah?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="controller.php" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="kodematkul" value="" id="kodedel">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            function cariData() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("input");
                filter = input.value.toUpperCase();
                table = document.getElementById("data");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            function reverseSemester(i) {
                if (i == "SP-1") {
                    return 11;
                } else if (i == "SP-2") {
                    return 22;
                } else if (i == "SP-3") {
                    return 33;
                } else if (i == "SP-4") {
                    return 44;
                } else {
                    return i;
                }
            }

            function getCellValue(i) {
                var table = document.getElementById('table');
                var arr = [];
                for (var c = 0, m = table.rows[i].cells.length; c < m - 1; c++) {
                    arr[c] = table.rows[i].cells[c].innerHTML;
                }
                document.getElementById("kodematkuledit").value = arr[0];
                document.getElementById("namamatkuledit").value = arr[1];
                document.getElementById("tugasedit").value = arr[2];
                document.getElementById("utsedit").value = arr[3];
                document.getElementById("uasedit").value = arr[4];
                document.getElementById("sksedit").value = arr[5];
                document.getElementById("semesteredit").value = arr[6];
                console.log(arr[6] == "1");
                //var p = document.getElementById("semesteredit");
                // p.querySelector("option").value = arr[6];
            }

            function setDeleteKode(i) {
                var table = document.getElementById('table');
                var arr = [];
                for (var c = 0, m = table.rows[i].cells.length; c < 1; c++) {
                    arr[c] = table.rows[i].cells[c].innerHTML;
                }
                document.getElementById("kodedel").value = arr[0];
            }
        </script>

</body>
<footer>

</footer>

</html>