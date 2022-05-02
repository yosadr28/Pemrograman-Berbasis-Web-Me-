<!DOCTYPE html>

<html>

<head>
  <title>Basic Form</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <form action="5a-form.php" method="post">
      <div class="mb-5">
        <label for="inputNama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="inputNama" name="nama" aria-describedby="namaHelp">
        <div id="namaHelp" class="form-text">Masukkan nama lengkap Anda.</div>
      </div>

      <div class="mb-5">
        <label class="form-label">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderL" value="L">
          <label class="form-check-label" for="genderL">
            Laki-Laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderP" value="P">
          <label class="form-check-label" for="genderP">
            Perempuan
          </label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>