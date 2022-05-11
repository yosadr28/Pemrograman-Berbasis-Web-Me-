<?php
require_once('connection.php');
require_once('matkuldt.php');

function getMatkul()
{
    $sql = "SELECT * FROM dt_matkul ORDER BY semester, sks, namamatkul";
    $datamatkul = [];
    $i=0;
    $matkul = [];
    try {
        $conn = createConnection();
        $result = $conn->query($sql, PDO::FETCH_ASSOC); 
        while ($matkul = $result->fetch()) {
            // Store each data in variables
            $kodematkul = $matkul['kodematkul'];
            $namamatkul=$matkul['namamatkul'];
            $sks=$matkul['sks'];
            $tugas = $matkul['tugas']; $uts =$matkul['uts']; $uas = $matkul['uas'];
            $semester=$matkul['semester'];
            $datamatkul[$i] = $matkul = new Matkul($kodematkul,  $namamatkul, $sks,  $tugas, $uts, $uas, $semester);
            $i++;
        }
        //print_r($datamatkul);
        return $datamatkul;
    }
    catch (PDOException $e) {
        die('Error reading data: ' . $e->getMessage());
    }
}

function addData($payload){
    try{
        $conn = createConnection();
        $sql = 'INSERT INTO dt_matkul (kodematkul, namamatkul, sks, tugas, uts, uas, semester) VALUES (?,?,?,?,?,?,?)';
        $statement = $conn->prepare($sql);
        $statement->execute([
            $payload['kodematkul'], $payload['namamatkul'], 
            $payload['sks'], $payload['tugas'], $payload['uts'], $payload['uas'], $payload['semester']
        ]);
    } catch(PDOException $e){
        die('Gagal Menambahkan Data : ' . $e->getMessage());
    }
}

function removeData($kodematkul){
    try{
        $conn = createConnection();
        $sql = "DELETE FROM dt_matkul WHERE kodematkul = '$kodematkul'";
        $conn -> query($sql); //beda query sama exec
    } catch (PDOException $e){
        die('Gagal Menghapus Data: ' . $e->getMessage());
    }
}

function ubahData($payload){
    try{
        $conn = createConnection();
        $sql = 'UPDATE dt_matkul SET namamatkul=?, sks=?, tugas=?,uts=?,uas=?, semester=? WHERE kodematkul=?';
        $statement = $conn->prepare($sql);
        $statement-> execute([
            $payload['namamatkul'], $payload['sks'], $payload['tugas'], $payload['uts'], 
            $payload['uas'], $payload['semester'], $payload['kodematkul']
        ]);
    } catch(PDOException $e){
        die('Error updating data: ' . $e->getMessage());
    }
}
